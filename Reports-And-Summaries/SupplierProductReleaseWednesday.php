<?php
    require('fpdf.php');
    //$TodaysDate = date('Y-m-d');
    //Assume todays dare is 2017
    $TodaysDate = "2017-11-15";
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
            $this->Cell(132, 28, "Supplier Product Release Report", 0, 0, 'R');
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

    $SupplierID = '0907201700001';
    $sql = "SELECT * FROM orders, order_items, products WHERE orders.Order_ID = order_items.Order_ID and order_items.Product_ID = products.ID and products.Supplier_ID='$SupplierID' and orders.Order_Date >= '$SaturdaysDate 7:00:00' AND orders.Order_Date <  '$TodaysDate 7:00:00'";
    $result = $conn->query($sql);
    $ProductCount = 0;
    $TotalDue = 0;
    if ($result->num_rows > 0) {
        $ProductReleaseEminnent = 'Yes';
        while ($row = $result->fetch_assoc()) {
            $OrderItemID[$ProductCount] = $row["Order_ID"]."-".$row["Product_ID"];
            $OrderItemDescription[$ProductCount] = $row["DisplayLine"];
            $OrderItemRP[$ProductCount] = $row["RP"];
            $TotalDue += $OrderItemRP[$ProductCount];
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
    $pdf->SetFont('Helvetica', 'B', 10);
    $pdf->Cell(0, 10, "Order Item ID", 0, 0);
    $pdf->setX(60);
    $pdf->Cell(0, 10, "Order Item Description", 0, 0);
    $pdf->Ln();
    
    $pdf->SetFont('Helvetica', '', 10);
    for ($i = 0; $i < $ProductCount; $i++) {
        $pdf->Cell(0, 10, $OrderItemID[$i], 0, 0);
        $pdf->setX(60);
        $pdf->Cell(0, 10, $OrderItemDescription[$i], 0, 1);
        
    }

    
    //$pdf->Output("F", "Summaries/Summary$TodaysDate.pdf");
    //echo "Code ran, no errors";
    $pdf->Output();
?>