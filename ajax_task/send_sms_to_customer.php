<?php 
if (isset($_POST['message'])) {
	$msg=$_POST['message'];;
	$phone=$_POST['phone_number'];
	if (strlen($phone)==12) {
		echo $msg;
		$to=$phone; // receiver phone no
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
		echo "<script>window.location.href='index';</script>";	
	}
}
?>