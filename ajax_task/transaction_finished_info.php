<?php 	
include('../db-comm/database_connection.php');
if (isset($_POST['section'])) {
	$selected_customer_id=$_POST['customer_id'];
	$get_customer_information=$connection->query("SELECT * FROM custormer WHERE customer_id='$selected_customer_id'");
	$customer_data=mysqli_fetch_array($get_customer_information);
	$phone_number=$customer_data['customer_phone_number'];
	$plate_number=$customer_data['car_plate_no'];
	$customer_names=$customer_data['customer_name'];
	$transaction_done=$connection->query("UPDATE bill SET status='Finished' WHERE customer_id='$selected_customer_id'");
		if ($transaction_done) {
			echo "<script>alert('CAR REPAIRMENT FINISHED');</script>";
			$reciever="25".$phone_number;
			$msg="Mukiriya wacu ".$customer_names.".Turabamenyesha yuko imodoka yawe ".$plate_number." Yarangiye gukorwa mushobora kuza mukayitwara,Murakoze.";
			if (strlen($reciever)==12) {
					$to=$reciever; // receiver phone no
					$msg=$msg; 	// content of the message
					$from="ATECAR"; //------- Sender ID/Title
					//--------------------

					$data=
					array(
					"sender"=>$from,
					"recipients"=>$to,
					"message"=>$msg,);
					$url="https://www.intouchsms.co.rw/api/sendsms/.json";
					$data=http_build_query($data);
					$username="SOS";
					$password="sossms";

					$ch=curl_init();
					curl_setopt($ch,CURLOPT_URL,$url);curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
					curl_setopt($ch,CURLOPT_POST,true);curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
					curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
					$result=curl_exec($ch);
					$httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
					curl_close($ch);
					echo $result;
					echo $httpcode;
			
			}
			else{
				confirm('Message Wont be sent because of the phone number is invalid');
			}
			/*MESSANGING THE OWNER OF THE CAR*/

			include('../content/personal_data.php');

		}
		else{
			echo "<script>alert('HABAYEHO IKIBAZO MUKURANGIZA GUKORWA KWIMODOKA');</script>";
			include('../content/personal_data.php');	
		}
}

?>
<!-- nextstepaf -->