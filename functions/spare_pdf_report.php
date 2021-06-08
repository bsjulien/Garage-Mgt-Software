<?php 
session_start();
$Making_user=$_SESSION['FullNames'];
include('../db-comm/database_connection.php');
?>
<p style="text-align: center;">Prepared By Garage Atecar</p><hr>
    <br><br><br><br><table>
        <tr>
            <td style="font-size: 15px;">
                <div id="reciever_information">
                    <p>REPORT,</p>
                    <p><b>FOR FINSHED SPARE</b></p>
                    <p><b>ON : GARAGE TRANSACTIONS</b></p>
                    <p>Made By :<?php echo $Making_user ?> </p>
                </div>
            </td>
            <td style="width:300px;"></td>
            <td style="font-size: 15px;">
                <div id="invoice_information">
                    <p><?php echo date("Y-m-d") ?></p>
                    <p></p>
                </div>
            </td>
        </tr>
    </table><br><br><br><br><br>
    <table border="1">
        <thead>
            <tr>
                <th style="padding: 6px 100px 6px 8px">NAME</th>
                <th style="padding: 6px 50px 6px 8px;width: 100px;">TYPE</th>
                <th style="padding: 6px 50px 6px 8px">CATEGORIE</th>
                <th style="padding: 6px 2px 6px 2px;width: 150px;">SPARE REMAINING</th>
                <th style="padding: 6px 2px 6px 2px;width: 200px;">LAST PURCHASING PRICE</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $view_all_spare=$connection->query("SELECT * FROM spair_parts WHERE spare_part_quantitie = 0 LIMIT 12");
                while($spare_info=mysqli_fetch_array($view_all_spare)){
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
                 <td><?php echo $spare_name; ?></td>
                 <td><?php echo $spare_type; ?></td>
                 <td><?php echo $spare_categorie; ?></td>
                 <td><?php echo $spare_quantity; ?></td>
                 <td><?php echo $last_purchase_price; ?></td>
             </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
include("../mpdf/mpdf.php");
$mpdf=new mPDF('P','A5'); 
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
?>