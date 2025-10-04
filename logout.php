<?php 
require_once 'include/initialize.php';
DoRecordLogs('Log Out', 'LOGOUT');
@session_start();
unset( $_SESSION['UID'] );
unset( $_SESSION['DISPLAYNAME'] );
unset( $_SESSION['USERNAME'] );
unset( $_SESSION['EMPID'] );
unset( $_SESSION['TYPE'] );
unset($_SESSION['ip'] );
unset($_SESSION['userAgent'] );
?>
<script language="javascript">
	window.location.href = "login.php?logout=1"
</script>