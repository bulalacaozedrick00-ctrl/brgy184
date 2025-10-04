<?php
require_once("include/initialize.php");
if(isset($_SESSION['UID'])){
  header("Location: index.php");
  exit();
}
$success_message = "";
$error_message = "";
$query = "SELECT * FROM loginattemp WHERE IPADDRESS = '".$_SERVER['REMOTE_ADDR']."'";

$mydb->setQuery($query);
$single_res = $mydb->loadSingleResult();

$displayWarning = 'style="display:none;"';
if ($single_res && isset($single_res->ATTEMPCOUNT)) {
  if ($single_res->ATTEMPCOUNT >= 2) {
    $displayWarning = '';
  }
}
?>
<?php
if (isset($_POST['btnLogin'])) {
 $email = htmlspecialchars(trim($_POST['username']));
 $upass = htmlspecialchars(trim($_POST['userpass']));
 $h_upass = $upass;
 if ($email == '' or $upass == '') {
  message("Invalid Username and Password!", "error");
  redirect("login.php");
} else {
 $user = new User(); 
 $res = $user::AuthenticateUser($email, $h_upass);

 if ($res == true) {
  if($_SESSION['TYPE']=='Super Administrator'){
    $_SESSION['SAUID']       = $_SESSION['SAUID'];
  }else{
    $_SESSION['UID']       = $_SESSION['UID'];
  } 

  $_SESSION['RESIDNO']          = $_SESSION['RESIDNO'];
  $_SESSION['BARANGAYID']       = $_SESSION['BARANGAYID'];
  $_SESSION['DISPLAYNAME']      = $_SESSION['DISPLAYNAME'] ;
  $_SESSION['USERNAME']         = $_SESSION['USERNAME'];
  $_SESSION['TYPE']             = $_SESSION['TYPE'];
  $_SESSION['FAMLEADERID']      = $_SESSION['FAMLEADERID'];
  $_SESSION['ip']          =    $_SERVER['REMOTE_ADDR'];
  $_SESSION['userAgent']   = $_SERVER['HTTP_USER_AGENT'];

  $query = "UPDATE `loginattemp` SET ATTEMPCOUNT = 0 WHERE IPADDRESS = '".$_SERVER['REMOTE_ADDR']."'";
  $istrue = $mydb->InsertThis($query);

  DoRecordLogs('Log In', 'LOGIN');
  $success_message = "Login Successfull!";
  redirect(WEB_ROOT.'index.php');

} else {
 if (!isset($_SESSION['accesscount'])) {
  $_SESSION['accesscount'] = 0;
}
$_SESSION['accesscount']++;
$ipAddress = $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM loginattemp WHERE IPADDRESS = '".$ipAddress."'";
$mydb->setQuery($query);
$rowcheck = $mydb->num_rows();

if ($rowcheck > 0) {
  $updateQuery = "UPDATE `loginattemp` SET `ATTEMPCOUNT` = `ATTEMPCOUNT` + 1 WHERE IPADDRESS = '".$ipAddress."'";
  $mydb->InsertThis($updateQuery);
} else {
  $insertQuery = "INSERT INTO `loginattemp`(`IPADDRESS`,`ATTEMPCOUNT`) VALUES ('".$ipAddress."', 1)";
  $mydb->InsertThis($insertQuery);
}
$remaining = 2 - $single_res->ATTEMPCOUNT;
$error_message = 'Account does not exist! You have only ' . $remaining . ' attempt(s) remaining.';

}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo WEB_ROOT;?>images/pasay.jpeg">
  <title>Barangay System</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box mt-n5">
    <div class="card card-outline card-primary mt-n5">
      <div class="card-body">
        <p class="login-box-msg">
          <img src="images/pasay.jpeg" width="30%">
          <br>Sign in to start your session
        </p>
        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="userpass" placeholder="Password" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <p <?php echo $displayWarning; ?> style="color:red;">
            <i class="fa fa-ban" style="font-size:20px;color:red;"></i> 
            You are temporarily block <span id="countdown">60</span> sec(s). Don't refresh the page!
          </p>

          <?php if ($displayWarning == 'style="display:none;"' && !empty($error_message)): ?>
            <p style="color:red;" class="message error"><?php echo $error_message; ?></p>
          <?php endif; ?>

          <input type="hidden" name="REMOTE_ADDR" id="REMOTE_ADDR" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
          <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
              <button type="submit" id="loginBtn" class="btn btn-primary btn-block" name="btnLogin" <?php echo ($displayWarning == '') ? 'disabled' : ''; ?>>Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="theme/js/login.js"></script>
  <script src="<?php echo WEB_ROOT; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>dist/js/adminlte.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var countdownElement = document.getElementById('countdown');
    var loginButton = document.getElementById('loginBtn');

    if (countdownElement) {
      var countdown = parseInt(countdownElement.innerText, 10);

      var interval = setInterval(function() {
        countdown--;
        countdownElement.innerText = countdown;

        if (countdown <= 0) {
          clearInterval(interval);
          var IPADDRESS = $('#REMOTE_ADDR').val(); 
          $.ajax({
            url: "controller.php?action=updatecountattemp",
            type: "POST",
            data: { IPADDRESS: IPADDRESS },
            success: function(data) {
              window.location = 'login.php';
            },
            error: function(xhr, status, error) {
              window.location = 'login.php';
            }
          });
          loginButton.disabled = false;
        }
      }, 1000); 
    }
  });
</script>