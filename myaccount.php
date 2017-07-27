<?php include 'header.php';
require_once("config.php");
if(!empty($_SESSION['current_user']['user_id']))
    $user_detail = fetchUserDetails($_SESSION['current_user']['username']);
$user_detail =$user_detail[0];
?>
    <div class="container" style="background-color: #112255">
        <div class="row">

          <h1>Hello   <?php echo (!empty($user_detail)?$user_detail['username']:''); ?></h1>
        </div>
    </div>

<?php include 'footer.php'; ?>