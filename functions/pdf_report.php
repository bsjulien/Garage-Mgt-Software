<?php 
session_start();
$Making_user=$_SESSION['FullNames'];
?>










<?php 
include('../db-comm/database_connection.php');
if (isset($_GET['custormer'])) {
    $customer_id=$_GET['custormer'];
    $get_full_information=$connection->query("SELECT * FROM custormer WHERE customer_id='$customer_id'");
    $customer_info=mysqli_fetch_array($get_full_information);
    $name=$customer_info['customer_name'];
    $plate_number=$customer_info['car_plate_no'];
    $address=$customer_info['customer_address'];
    $date_in=$customer_info['date_in'];
    $phone_number=$customer_info['customer_phone_number'];
    $get_bill=$connection->query("SELECT * FROM bill WHERE customer_id='$customer_id'");
    $bill_info=mysqli_fetch_array($get_bill);
    $bill=$bill_info['bill'];
    ?>
<!DOCTYPE html>
<html style="overflow-x: hidden;">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
	<table>
		<tr>
			<td style="font-size: 15px;">
				<div id="reciever_information">
			        <p>TO,</p>
			        <p><b>RECIEVER (BILL TO)</b></p>
			        <p>NAME : <?php echo $name; ?></p>
			        <p>Made By : <?php echo $Making_user; ?></p>
			    </div>
			</td>
			<td style="width:270px;"></td>
			<td style="font-size: 15px;">
				<div id="invoice_information">
			        <p>Prepared By Garage  Atecar</p>
			        <p>Invoice No : 001678</p>
			        <p>Invoice Date : 000299</p>
			        <p>Total : <?php echo number_format($bill); ?> FRW</p>
			    </div>
			</td>
		</tr>
	</table><br><br><br><br><br>
	<table border="1">
		<thead>
            <tr>
                <th style="padding: 6px 50px 6px 8px">SPARE NAME</th>
                <th style="padding: 6px 50px 6px 8px">SPARE TYPE</th>
                <th style="padding: 6px 50px 6px 8px">SPARE QUANTITY</th>
                <th style="padding: 6px 50px 6px 8px">UNIT PRICE</th>
                <th style="padding: 6px 50px 6px 8px">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $get_spare_on_specific_custormer=$connection->query("SELECT id,spare_part_id,spare_quantity_used,spare_price FROM garage_car_transactions WHERE spare_quantity_used >0 AND customer_id='$customer_id'");
                        $spare_overall_total=0;
                        while($spare_retriver=mysqli_fetch_array($get_spare_on_specific_custormer)){
                            $id=$spare_retriver['id'];
                            $spare_id=$spare_retriver['spare_part_id'];
                            $spare_price=$spare_retriver['spare_price'];
                            $spare_quantitie=$spare_retriver['spare_quantity_used'];
                            $spare_detail=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
                                $spare_info_retriver=mysqli_fetch_array($spare_detail);
                                $spare_name=$spare_info_retriver['spare_part_name'];
                                $spare_type=$spare_info_retriver['spare_part_type'];
                                $spare_categorie=$spare_info_retriver['spare_part_categorie'];
                                $total=$spare_quantitie*$spare_price;
                                $spare_overall_total=$spare_overall_total+$total;
            ?>
            <tr>
                <td><?php echo $spare_name; ?></td>
                <td><?php echo $spare_type; ?></td>
                <td><?php echo $spare_quantitie; ?></td>
                <td><?php echo number_format($spare_price); ?> FRW</td>
                <td><?php echo number_format($total); ?> FRW</td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="4" style="background-color: white;border: white;border-right: black;"></td>
                <td><?php echo number_format($spare_overall_total); ?> FRW</td>
            </tr>
        </tbody>

	</table>
	<?php 
        $get_worker_on_specific_custormer=$connection->query("SELECT worker_id,worker_price FROM garage_car_transactions WHERE customer_id='$customer_id' AND worker_id!='21'");
            $total_working=0;
            while($workers_retriver=mysqli_fetch_array($get_worker_on_specific_custormer)){
                $worker_id=$workers_retriver['worker_id'];
                $worker_price=$workers_retriver['worker_price'];
                $total_working=$total_working+$worker_price;
            }
    ?>
    <p id="working_statement">+ <?php echo number_format($total_working); ?> FRW FOR WORKING</p>
    <img src="../img/stamp/17698841-car-service-garage-grunge-stamp.jpg" style="width: 200px;float: right;margin-top: 100px;opacity: 0.1">
</body>
</html>
<?php

include("../mpdf/mpdf.php");
$mpdf=new mPDF('P','A4'); 
$mpdf = new mPDF(); $stylesheet = file_get_contents('../mpdf/pdf.css'); 
$mpdf->WriteHTML($stylesheet,1);
$mpdf->SetDisplayMode('fullpage');
//$mpdf->AddPage("L");

// LOAD a stylesheet
$stylesheet = file_get_contents('../mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$report_content=ob_get_contents();
ob_clean();

$mpdf->WriteHTML($report_content,2);
$mpdf->Output('REPORT.pdf','I');
exit;
}?>



































































<?php 
include('../db-comm/database_connection.php');
if (isset($_GET['daily_transaction'])) {
    $this_date=date("Y-m-d");
    	
?>
<!DOCTYPE html>
<html style="overflow-x: hidden;">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
	<p style="text-align: center;">Prepared By Garage Atecar</p><hr>
	<br><br><br><br><table>
		<tr>
			<td style="font-size: 15px;">
				<div id="reciever_information">
			        <p>REPORT,</p>
			        <p><b>FOR <?php echo $this_date; ?></b></p>
			        <p><b>ON : GARAGE TRANSACTIONS</b></p>
			        <p>Desgined By : <?php echo $Making_user; ?></p>
			    </div>
			</td>
			<td style="width:300px;"></td>
			<td style="font-size: 15px;">
				<div id="invoice_information">
			        <p>Garage Atecar</p>
			        <p></p>
			    </div>
			</td>
		</tr>
	</table><br><br><br><br><br>
	<table border="1">
		<thead>
            <tr>
                <th style="padding: 6px 100px 6px 8px">NAME</th>
                <th style="padding: 6px 50px 6px 8px">PHONE</th>
                <th style="padding: 6px 50px 6px 8px">ADDRES</th>
                <th style="padding: 6px 2px 6px 2px;width: 150px;">SPARE NAME</th>
                <th style="padding: 6px 50px 6px 8px">S.TYPE</th>
                <th style="padding: 6px 20px 6px 8px">QUANTITY</th>
                <th style="padding: 6px 0px 6px 8px;width: 100px;">UNIT PRICE</th>
                <th style="padding: 6px 50px 6px 8px">TOTAL</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $total_bill_made_per_day=0;
    		$get_full_information=$connection->query("SELECT * FROM custormer WHERE date_in='$this_date' LIMIT 1");
			    while($customer_info=mysqli_fetch_array($get_full_information)){
			    $c_id=$customer_info['customer_id'];
			    $name=$customer_info['customer_name'];
			    $plate_number=$customer_info['car_plate_no'];
			    $address=$customer_info['customer_address'];
			    $date_in=$customer_info['date_in'];
    			$phone_number=$customer_info['customer_phone_number'];
	    		$get_bill=$connection->query("SELECT * FROM bill WHERE customer_id='$c_id'");
	    		$bill_info=mysqli_fetch_array($get_bill);
	    			$bill=$bill_info['bill'];
	    			$total_bill_made_per_day=$total_bill_made_per_day+$bill;
	    		$get_spare_on_specific_custormer=$connection->query("SELECT id,spare_part_id,spare_quantity_used,spare_price FROM garage_car_transactions WHERE spare_quantity_used >0 AND customer_id='$c_id'");
	    		$get_number_of_used=mysqli_num_rows($get_spare_on_specific_custormer);
	    		$num=$get_number_of_used;
            ?>
            <tr>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $name; ?></td>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $phone_number; ?></td>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $address; ?></td>
                <?php 
                
                        $spare_overall_total=0;
                        while($spare_retriver=mysqli_fetch_array($get_spare_on_specific_custormer)){
                            $id=$spare_retriver['id'];
                            echo "$id";
                            $spare_id=$spare_retriver['spare_part_id'];
                            $spare_price=$spare_retriver['spare_price'];
                            $spare_quantitie=$spare_retriver['spare_quantity_used'];
                            $spare_detail=$connection->query("SELECT * FROM spair_parts WHERE spare_part_id='$spare_id'");
                                $spare_info_retriver=mysqli_fetch_array($spare_detail);
                                $spare_name=$spare_info_retriver['spare_part_name'];
                                $spare_type=$spare_info_retriver['spare_part_type'];
                                $spare_categorie=$spare_info_retriver['spare_part_categorie'];
                                $total=$spare_quantitie*$spare_price;
                                $spare_overall_total=$spare_overall_total+$total;
            	?>
            	<?php if($get_number_of_used != $num){echo "<tr>";}else{} ?>
                	<td><?php echo $spare_name; ?></td>
                	<td><?php echo $spare_type; ?></td>
                	<td><?php echo $spare_quantitie; ?></td>
                	<td><?php echo number_format($spare_price); ?> FRW</td>
                	<td><?php echo number_format($total); ?> FRW</td>
                <?php if($get_number_of_used != $num){echo "</tr>";}else{} ?>
            	<?php $get_number_of_used=$get_number_of_used-1;}?>
            </tr>
            <tr>
                <td colspan="7" style="background-color: white;border: white;border-right: black;"></td>
                <td><?php echo number_format($spare_overall_total); ?> FRW</td>
            </tr>
        <?php } ?>
        </tbody>

	</table>
</body>
</html>
<?php

include("../mpdf/mpdf.php");
$mpdf=new mPDF('P','A4'); 
$mpdf = new mPDF(); $stylesheet = file_get_contents('../mpdf/pdf.css'); 
$mpdf->WriteHTML($stylesheet,1);
$mpdf->SetDisplayMode('fullpage');
//$mpdf->AddPage("L");

// LOAD a stylesheet
$stylesheet = file_get_contents('../mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$report_content=ob_get_contents();
ob_clean();

$mpdf->WriteHTML($report_content,2);
$mpdf->Output('REPORT.pdf','I');
exit;
}
?>





