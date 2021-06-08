<?php include('../db-comm/database_connection.php'); ?>
<?php
if (isset($_GET['finished'])) {
	$label="FINSHED AND ABOUT TO BE FINISHED SPARE PARTS GARAGE ATECAR";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$label.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<table border="50" bordercolor="black" cellpadding="5" cellspacing="2">
	<tr>
		<td colspan="6" align="center" bordercolor="#99FFFF" bgcolor="#F8F8FF"> <center>LIST OF FINISHED AND ABOUT TO FINISH SPARE</center></td>
	</tr><p>
		<td>N<sup>o</sup></td>
		<td>SPARE NAME</td>
		<td>SPARE TYPE</td>
		<td>SPARE CATEGORIE</td>
		<td>SPARE QUANTITIE REMAINING</td>
		<td>LAST PURCHASING PRICE</td>
	</tr>
	 <?php 
                $view_all_spare=$connection->query("SELECT * FROM spair_parts WHERE spare_part_quantitie < 2");
                $id=0;
                while($spare_info=mysqli_fetch_array($view_all_spare)){
                	$id=$id+1;
                    $spare_name=$spare_info['spare_part_name'];
                    $spare_type=$spare_info['spare_part_type'];
                    $spare_categorie=$spare_info['spare_part_categorie'];
                    $spare_quantity=$spare_info['spare_part_quantitie'];
                    $spare_id=$spare_info['spare_part_id'];
                    $spare_min_price=$spare_info['spare_minimum_price'];
                    $spare_purchasing_price=$connection->query("SELECT * FROM purchasing WHERE spare_part_id='$spare_id'");
                        $purchasing_data=mysqli_fetch_array($spare_purchasing_price);
                        $last_purchase_price=$purchasing_data['purchase_price'];
    ?>
    <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $spare_name; ?></td>
            <td><?php echo $spare_type; ?></td>
            <td><?php echo $spare_categorie; ?></td>
            <td><?php echo $spare_quantity; ?></td>
            <td><?php echo $last_purchase_price; ?></td>
    </tr>
    <?php } ?>
</table>
<?php
echo "<script>window.location.href='index'</script>";
}
?>













































<?php
if (isset($_GET['purchasing'])) {
	$label="PURCHASING REPORT ATECAR";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$label.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<table border="1">
		<thead>
            <tr>
            	<th>ID</th>
                <th style="padding: 6px 100px 6px 8px">SPARE NAME</th>
                <th style="padding: 6px 50px 6px 8px">SPARE TYPE </th>
                <th style="padding: 6px 50px 6px 8px">SPARE CATEGORIE</th>
                <th style="padding: 6px 50px 6px 8px">BUYER NAME</th>
                <th style="padding: 6px 2px 6px 2px;width: 150px;">PURCHASED QUANTITY</th>
                <th style="padding: 6px 50px 6px 8px">PURCHASE PRICE</th>
                <th style="padding: 6px 20px 6px 8px">DATE OF PURCHASE</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $total_bill_made_per_day=0;
            $id=0;
    		$get_full_information=$connection->query("SELECT * FROM spair_parts");
			    while($spare_info=mysqli_fetch_array($get_full_information)){
			    $id=$id+1;
			    $spare_id=$spare_info['spare_part_id'];
			    $spare_name=$spare_info['spare_part_name'];
			    $spare_type=$spare_info['spare_part_type'];
			    $spare_categorie=$spare_info['spare_part_categorie'];
			    $spare_quantity=$spare_info['spare_part_quantitie'];
    			$spare_min_price=$spare_info['spare_minimum_price'];
	    		$get_prchasing=$connection->query("SELECT * FROM purchasing WHERE spare_part_id='$spare_id'");
	    		$get_number_spare_purchasing=mysqli_num_rows($get_prchasing);
	    		$num=$get_number_spare_purchasing;
            ?>
            <tr>
            	<td rowspan="<?php echo $get_number_spare_purchasing; ?>"><?php echo $id; ?></td>
                <td rowspan="<?php echo $get_number_spare_purchasing; ?>"><?php echo $spare_name; ?></td>
                <td rowspan="<?php echo $get_number_spare_purchasing; ?>"><?php echo $spare_type; ?></td>
                <td rowspan="<?php echo $get_number_spare_purchasing; ?>"><?php echo $spare_categorie; ?></td>
                <?php 
                
                        $spare_overall_total=0;
                        if ($get_number_spare_purchasing == 0) {
                        	echo '
                        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----------------</td>
                        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----------------</td>
                        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----------------</td>
                        			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----------------</td>
                        		</tr>


                        	';
                        }
                        while($purchase_retriver=mysqli_fetch_array($get_prchasing)){
                            $quantity_purchased=$purchase_retriver['purchase_quantity'];
                            $buyer_name=$purchase_retriver['buyer'];
                            $date_made=$purchase_retriver['date_made'];
                            $purchase_price=$purchase_retriver['purchase_price'];
            	?>
            	<?php if($get_number_spare_purchasing != $num){echo "<tr border='100'>";}else{} ?>
                	<td><?php if(!$purchase_retriver){echo "----";}else{echo $buyer_name;} ?></td>
                	<td><?php if(!$purchase_retriver){echo "----";}else{echo $quantity_purchased;} ?></td>
                	<td><?php if(!$purchase_retriver){echo "----";}else{echo number_format($purchase_price); }?> FRW</td>
                	<td><?php if(!$purchase_retriver){echo "----";}else{echo $date_made;}?></td>
                <?php if($get_number_spare_purchasing != $num){echo "</tr>";}else{} ?>
            	<?php $get_number_spare_purchasing=$get_number_spare_purchasing-1;}?>
            </tr>
        <?php } ?>
        </tbody>

	</table>
<?php
echo "<script>window.location.href='index'</script>";
}
?>




































<?php
if (isset($_GET['avialable'])) {
	$label="AVAILABLE SPARE PARTS GARAGE ATECAR";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$label.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<table border="50" bordercolor="black" cellpadding="5" cellspacing="2">
	<p>GARAGE ATECAR</p>
	<p>AVAILABLE SPARE IN STOCK <b>ON : <?php echo date("Y-m-d"); ?></b></p>
	<p><?php echo date("h:sa"); ?></p>
	<p></p>
	<p></p>
	<p></p>
	<tr>
		<td colspan="7" align="center" bordercolor="#99FFFF" bgcolor="#F8F8FF"> <center>LIST OF FINISHED AND ABOUT TO FINISH SPARE</center></td>
	</tr><p>
		<td>N<sup>o</sup></td>
		<td>SPARE NAME</td>
		<td>SPARE TYPE</td>
		<td>SPARE CATEGORIE</td>
		<td>SPARE QUANTITIE REMAINING</td>
		<td>SPARE SELLING MINIMUM PRICE</td>
		<td>LAST PURCHASING PRICE</td>
	</tr>
	 <?php 
                $view_all_spare=$connection->query("SELECT * FROM spair_parts");
                $id=0;
                while($spare_info=mysqli_fetch_array($view_all_spare)){
                	$id=$id+1;
                    $spare_name=$spare_info['spare_part_name'];
                    $spare_type=$spare_info['spare_part_type'];
                    $spare_categorie=$spare_info['spare_part_categorie'];
                    $spare_quantity=$spare_info['spare_part_quantitie'];
                    $spare_id=$spare_info['spare_part_id'];
                    $spare_min_price=$spare_info['spare_minimum_price'];
                    $spare_purchasing_price=$connection->query("SELECT * FROM purchasing WHERE spare_part_id='$spare_id'");
                        $purchasing_data=mysqli_fetch_array($spare_purchasing_price);
                        $last_purchase_price=$purchasing_data['purchase_price'];
    ?>
    <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $spare_name; ?></td>
            <td><?php echo $spare_type; ?></td>
            <td><?php echo $spare_categorie; ?></td>
            <td><?php echo $spare_quantity; ?></td>
            <td><?php echo $spare_min_price; ?></td>
            <td><?php echo $last_purchase_price; ?></td>
    </tr>
    <?php } ?>
</table>
<?php
echo "<script>window.location.href='index'</script>";
}
?>