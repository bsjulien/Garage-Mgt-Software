<?php

	if (isset($_POST['section'])) {
		$section = $_POST['section'];
		if ($section == 'view_all_spare_parts') {
  			include('content/view_spairpart_content.php');
		}
		elseif ($section == 'view_all_purchase') {
			include('content/view_all_purchase.php');
		}
		elseif ($section == 'home') {
			include('content/home.php');
		}
		elseif ($section == 'add_spare_part') {
			include('content/add_spareparts_content.php');
		}
		elseif ($section == 'add_worker'){
			include('content/add_worker_content.php');
		}
		elseif ($section == 'view_worker_info') {
			include('content/view_worker_content.php');
		}
		elseif ($section == 'custormer') {
			include('content/custormer.php');
		}
		elseif ($section == 'view_all_transactions') {
			include('content/view_all_transactions.php');
		}
		elseif ($section == 'statistics') {
			include('content/statistics.php');
		}
		elseif ($section == 'personal_data') {
			include('content/personal_data.php');
		}
		elseif ($section == 'appointment') {
			include('content/appointment.php');
		}
		elseif ($section == 'purchase_spare') {
			include('content/purchase_spare.php');
		}
		elseif ($section == 'reports') {
			include('content/reports.php');
		}
	/*	elseif($section == 'purchase_records'){
			include('content/purchased_products.php');
		}*/
	}

?>
