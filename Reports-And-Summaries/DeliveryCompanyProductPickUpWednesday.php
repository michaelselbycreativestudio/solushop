<?php

    $Fare = 12;

    require('fpdf.php');
    $TodaysDate = date('Y-m-d');
    $monthAndYear = date('m-d');
    // First and last days of the previous month.
    $FirstDayOfPreviousMonthDate = date("j-n-Y", strtotime("first day of previous month"));
    $LastDayOfPreviousMonthDate = date("j-n-Y", strtotime("last day of previous month"));
    $PreviousMonthAndYear =  date("F Y", strtotime("last day of previous month"));

    // First and last days of the current month.
    $FirstDayOfCurrentMonthDate = date("j-n-Y", strtotime("first day of current month"));
    $LastDayOfCurrentMonthDate = date("j-n-Y", strtotime("last day of current month"));
    $CurrentMonthAndYear =  date("F Y");

    $CurrentMonthAndYearSQL =  date("n/Y");
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image("../assets/images/logo.png", 80, 7.5, 50);
            //$this->Image('solutekblackandblue.png', 37, 8, 30);
            // Arial bold 15
            $this->SetFont('Helvetica', '', 15);
            // Move to the right
            //$this->Cell(90);
            // Title
            $this->Cell(132, 28, "EEGL Product Pick-Up Guide", 0, 0, 'R');
            // Line break
            $this->Ln(20);
        }
        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }
    $TodaysDateObject = new DateTime($TodaysDate);
    $TodaysDateWords = $TodaysDateObject->format("F j, Y");
    $TodaysDateObject->modify('-3 days');
    $SaturdaysDate = $TodaysDateObject->format('Y-m-d');
    include("../databaseconnection.php");
    
    // Create connection
    $conn  = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo "orders.Order_Date >= '$SaturdaysDate 7:00:00' AND orders.Order_Date <  '$TodaysDate 7:00:00'";
    

    //$SupplierID = '0907201700001';
   $sql = "SELECT *, order_items.Quantity AS OrderItemQuantity, suppliers.Phone as SupplierPhone, suppliers.Address as SupplierAddress FROM orders, order_items, order_items_state, products, suppliers WHERE order_items.state = order_items_state.ID and orders.Order_ID = order_items.Order_ID and order_items.Product_ID = products.ID and products.Supplier_ID = suppliers.ID and order_items.State = '1' ORDER BY Supplier_ID";
    $result = $conn->query($sql);
    $ProductCount = 0;
    $TotalDue = 0;
    $SupplierIDCount = 0;
    $PreviousSupplierID ='';
    if ($result->num_rows > 0) {
        $ProductReleaseEminnent = 'Yes';
        while ($row = $result->fetch_assoc()) {
            $OrderItemID[$ProductCount] = $row["Order_ID"]."-".$row["Product_ID"];
            $OrderItemDescription[$ProductCount] = $row["DisplayLine"];
            $OrderItemRP[$ProductCount] = $row["RP"];
            $SupplierName[$ProductCount] = $row["Name"];
            $OrderItemQuantity[$ProductCount] = $row["OrderItemQuantity"];
            $TotalDue += $OrderItemRP[$ProductCount];
            $Supplier_ID[$ProductCount] = $row["Supplier_ID"];
            if ($row["Supplier_ID"]!=$PreviousSupplierID) {
                $Supplier_IDStorage[$SupplierIDCount] = $row["SupplierID"];
                $SupplierPhone[$SupplierIDCount] = $row["SupplierPhone"];
                $SupplierAltPhone[$SupplierIDCount] = $row["AltPhone"];
                $SupplierAddress[$SupplierIDCount] = $row["SupplierAddress"];
                $SupplierIDCount++;

            }
            $PreviousSupplierID = $row["Supplier_ID"];
            $ProductCount++;
        }
    }



    // Instanciation of inherited class
    $pdf             = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->setX(90);
    //echoing current month
    $pdf->Cell(30, 0, "$TodaysDateWords", 0, 0, 'C');

    $pdf->Ln();
    $pdf->setY(40);

    $pdf->Ln();
    $pdf->SetFont('Helvetica', 'B', 9);
    $pdf->Cell(0, 10, "Order Item ID", 0, 0);
    $pdf->setX(48);
    $pdf->Cell(0, 10, "Order Item Description", 0, 0); 
    $pdf->setX(115);
    $pdf->Cell(0, 10, "Supplier Name", 0, 0);
    $pdf->setX(167);
    $pdf->Cell(0, 10, "Signature", 0, 0);
    $pdf->Ln();
    
    $pdf->SetFont('Helvetica', '', 9);
    for ($i = 0; $i < $ProductCount; $i++) {
        $pdf->Cell(0, 10, $OrderItemID[$i], 0, 0);
        $pdf->setX(48);
        $pdf->Cell(0, 10, $OrderItemDescription[$i]." ( x ".$OrderItemQuantity[$i]." )", 0, 0);
        $pdf->setX(115);
        $pdf->Cell(0, 10, $SupplierName[$i], 0, 0);
        $pdf->setX(160);
        $pdf->Cell(0, 10, "....................................", 0, 1);
    }


    //adding a page
    $pdf->AddPage('P', 'A4', '0');
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->setX(90);
    //echoing current month
    $pdf->Cell(30, 0, "Suppliers' Information", 0, 0, 'C');

    $pdf->Ln();
    $pdf->setY(40);

    $pdf->Ln();
    $pdf->SetFont('Helvetica', 'B', 9);
    $pdf->Cell(0, 10, "Supplier Name", 0, 0);
    $pdf->setX(60);
    $pdf->Cell(0, 10, "Address", 0, 0); 
    $pdf->setX(120);
    $pdf->Cell(0, 10, "Phone number", 0, 0);
    $pdf->setX(167);
    $pdf->Cell(0, 10, "Alternate Phone", 0, 0);
    $pdf->Ln();

    $pdf->SetFont('Helvetica', '', 9);
    for ($i = 0; $i < $SupplierIDCount; $i++) {
        $pdf->Cell(0, 10, $SupplierName[$i], 0, 0);
        $pdf->setX(60);
        $pdf->Cell(0, 10, $SupplierAddress[$i], 0, 0);
        $pdf->setX(120);
        $pdf->Cell(0, 10, $SupplierPhone[$i], 0, 0);
        $pdf->setX(168);
        $pdf->Cell(0, 10, $SupplierAltPhone[$i], 0, 1);
    }


    
    $pdf->Output("F", "Pick-Ups/Wednesday-$TodaysDate.pdf");
    //echo "Code ran, no errors";
    //$pdf->Output();

    $Cost = $SupplierIDCount * $Fare;
    //insert into database
    $DateTimeSQL = date("Y-m-d G:i:s");
    $sql = "INSERT INTO `pick-ups` (`ID`, `Date`, `Cost`, `Guide`) VALUES (NULL, '$DateTimeSQL', '$Cost', 'Wednesday-$TodaysDate.pdf')";
    $conn->query($sql);

    $sql = "SELECT MAX(ID) as ID from `pick-ups`";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pickUpID = $row["ID"];
        }
    }


    //select greatest ID and use to insert the ID
    for ($i = 0; $i < $ProductCount; $i++) {
        $sql = "INSERT INTO `pick-up-items` (`pick-up-ID`, `order-item-ID`, `order-item-Quantity`, `supplier-ID`) VALUES ('$pickUpID', '".$OrderItemID[$i]."', '".$OrderItemQuantity[$i]."', '".$Supplier_ID[$i]."')";
        $conn->query($sql);
    }
?>