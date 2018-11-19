<?php
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
            $this->Cell(122, 28, "Supplier Product Release Wednesday", 0, 0, 'R');
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
    $date = new DateTime($TodaysDate);
    $date->modify('-1 day');
    $yesterdaysdate = $date->format('Y-m-d');
    include("../databaseconnection.php");
    
    // Create connection
    $conn  = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $SupplierID = '0907201700001';
    $sql = "SELECT * FROM orders, order_items, products WHERE orders.Order_ID = order_items.Order_ID and order_items.Product_ID = products.ID and products.Supplier_ID='$SupplierID' and orders.Order_Date LIKE '%$CurrentMonthAndYearSQL'";
    $result = $conn->query($sql);
    $ProductCount = 0;
    $TotalDue = 0;
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $OrderItemID[$ProductCount] = $row["Order_ID"]."-".$row["Product_ID"];
            $OrderItemDescription[$ProductCount] = $row["DisplayLine"];
            $OrderItemRP[$ProductCount] = $row["RP"];
            $TotalDue += $OrderItemRP[$ProductCount];
            $ProductCount++;
            

        }
    }



    $TodaysDateWords = date('l jS \of F Y');
    // Instanciation of inherited class
    $pdf             = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 13);
    $pdf->setX(90);
    //echoing current month
    $pdf->Cell(30, 0, "$CurrentMonthAndYear", 0, 0, 'C');
    //echoing previous month
    //$pdf->Cell(30, 0, "$PreviousMonthAndYear", 0, 0, 'C');
    $pdf->Ln();
    $pdf->setY(40);
    //$pdf->setX(87);
    //$pdf->Cell(30, 10, "Total Amount Due : $AmountDueTotal", 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Helvetica', 'B', 10);
    $pdf->Cell(0, 10, "Order Item ID", 0, 0);
    $pdf->setX(60);
    $pdf->Cell(0, 10, "Order Item Description", 0, 0);
    //$pdf->setX(120);
    //$pdf->Cell(0, 10, "Order Item Status", 0, 0);
    $pdf->setX(140);
    $pdf->Cell(0, 10, "Release Price", 0, 0);
    $pdf->Ln();
    
    $pdf->SetFont('Helvetica', '', 10);
    for ($i = 0; $i < $ProductCount; $i++) {
        $pdf->Cell(0, 10, $OrderItemID[$i], 0, 0);
        $pdf->setX(60);
        $pdf->Cell(0, 10, $OrderItemDescription[$i], 0, 0);
        //$pdf->setX(120);
        //$pdf->Cell(0, 10, $DNoTrips[$i], 0, 0);
        $pdf->setX(140);
        $pdf->Cell(0, 10, $OrderItemRP[$i], 0, 1);
    }
    $pdf->Ln();
    $pdf -> SetFont('Helvetica', '', 14);
    $pdf -> Cell(121, 10, "Total Due : GHS $TotalDue", 0, 0, 'R');
    
    //$pdf->Output("F", "Summaries/Summary$TodaysDate.pdf");
    //echo "Code ran, no errors";
    $pdf->Output();
?>