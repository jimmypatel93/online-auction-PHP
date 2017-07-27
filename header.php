<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/9/2016
 * Time: 15:49
 */
echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Online Auction</title>

</head>";
?>
<!DOCTYPE html>

<html>


<head>

    <style>

        .header .header-nav ul#nav-account ul.dropdown-menu,
        .header .header-nav ul#nav-library ul.dropdown-menu {
            position: relative;
            z-index: 10000;

        }

    </style>

    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body style="background: #2c3338;
  color: #606468;">

<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Online Auction</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <?php if(isset($_SESSION['current_user']['username'])): ?>
                    <li><a href="sell.php">Sell Product</a></li>
                    <li><a href="bid.php">Bid Product</a></li>
                <?php endif; ?>
                <li><a href="aboutUs.php">About Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right"
                <?php if(isset($_SESSION['current_user']['username']) ): ?>
                    <li><a href="myaccount.php">Hi, <?php echo $_SESSION['current_user']['username']; ?></a></li>
                    <li><a href="your_item.php">Your Items</a></li>
                    <li><a href="logout.php">Logout</a></li>

                <?php else: ?>
                    <li><a href="register.php">Sign Up</a></li>
                    <li><a href="login.php">Login</a></li>

                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>