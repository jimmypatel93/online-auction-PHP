<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/9/2016
 * Time: 15:29
 */
//Links for logged in user
if(isUserLoggedIn()) {
    echo "
	<ul>
	<li><a href='myaccount.php'>Account Home</a></li>
	<li><a href='logout.php'>Logout</a></li>
	</ul>";

    //Links for permission level 2 (default admin)
    //if ($loggedInUser->checkPermission(array(2))){
    echo "
	<ul>

	<li><a href='admin_users.php'>Admin Users</a></li>

	</ul>";
    //}
}
//Links for users not logged in
else {
    echo "
	<ul>
	<li><a href='index.php'>Home</a></li>
	<li><a href='admin_users.php'>View Records</a> </li>
	<li><a href='login.php'>Login</a></li>
	<li><a href='register.php'>Register</a></li>
	</ul>";
}

?>
