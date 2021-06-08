<?php 
session_start();
$Making_user=$_SESSION['FullNames'];
include('../db-comm/database_connection.php'); 
$this_date=date("Y-m-d");
?>
<?php
if (isset($_GET['dialy'])) {
	$label="GARAGE ATECAR DAIRY REPORT";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$label.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
    <p style="text-align: center;">Prepared By Garage Atecar<hr>
    <p>REPORT,</p>
    <p><b>FOR <?php echo $this_date; ?></b></p>
    <p><b>ON : GARAGE TRANSACTIONS</b></p>
    <p>Desgined By : <?php echo $Making_user; ?></p>
    <p>GARAGE ATECAR</p>
    <p>DIARY REPORT</p>
        <?php 
            $total_bill_made_per_day=0;
            $get_full_information=$connection->query("SELECT * FROM custormer WHERE date_in='$this_date'");
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
    <table border="1">
        <thead>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>CUSTOMER PHONE NUMBER</th>
                <th>CUSTOMER ADDRES</th>
                <th>SPARE NAME</th>
                <th>SPARE TYPE</th>
                <th>SAPRE QUANTITY</th>
                <th>SPARE UNIT PRICE</th>
                <th>SPARE TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $name; ?></td>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $phone_number; ?></td>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $address; ?></td>
                <?php 
                    if (!$get_number_of_used) {
                        echo"
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                        ";
                    }

                ?>
                <?php 
                
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
        </tbody>
    </table>
    ****************************************************************************************************************************************
        <?php } ?>
        
<?php
echo "<script>window.location.href='index'</script>";
}
?>











<?php
if (isset($_GET['monthly'])) {
    $label="GARAGE ATECAR MONTHLY REPORT";
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$label.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    $month=date("m");
?>

    <p style="text-align: center;">Prepared By Garage Atecar<hr>
    <p>REPORT,</p>
    <p><b>FOR <?php echo $this_date; ?></b></p>
    <p><b>ON : GARAGE TRANSACTIONS</b></p>
    <p>Desgined By : <?php echo $Making_user; ?></p>
    <p>GARAGE ATECAR</p>
    <p>MONTH REPORT</p>
        <?php 
            $total_bill_made_per_day=0;
            $this_month_start_date="2018-".$month."-01";
            $this_month_end_date="2018-".$month."-31";
            $get_full_information=$connection->query("SELECT * FROM custormer WHERE date_in >'$this_month_start_date'");
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
    <table border="1">
        <thead>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>CUSTOMER PHONE NUMBER</th>
                <th>CUSTOMER ADDRES</th>
                <th>SPARE NAME</th>
                <th>SPARE TYPE</th>
                <th>SAPRE QUANTITY</th>
                <th>SPARE UNIT PRICE</th>
                <th>SPARE TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $name; ?></td>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $phone_number; ?></td>
                <td rowspan="<?php echo $get_number_of_used; ?>"><?php echo $address; ?></td>
                <?php 
                    if (!$get_number_of_used) {
                        echo"
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                        ";
                    }

                ?>
                <?php 
                
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
        </tbody>
    </table>
    ****************************************************************************************************************************************
        <?php } ?>
        
<?php
echo "<script>window.location.href='index'</script>";
}
?>