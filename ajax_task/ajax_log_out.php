<?php if (isset($_POST['section'])) 
session_start();
		{
		unset($_SESSION['UserName']); 
		unset($_SESSION['title']); 
		unset($_SESSION['FullNames']); 
?>
	<script type="text/javascript">
        document.location.href = 'login';
    </script>
<?php 
		} 
?>