<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/9/2016
 * Time: 20:06
 */

require_once("config.php");

require_once("header.php");

if(!empty($_POST))
{
    $errors = array();
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    //Perform some validation

    if($username == "")
    {
        $errors[] = "enter username";
    }
    if($password == "")
    {
        $errors[] = "enter password";
    }

    if(count($errors) == 0)
    {
        //retrieve the records of the user who is trying to login
        $userdetails = fetchUserDetails($username);

        foreach ($userdetails as $details) {
            //See if the user's account is activated
            if ($details["Active"] == 0) {
                $errors = "account inactive";
            }

            if ($password != $details["password"]) {
                $errors = "Invalid password";
            } else {

                if ($password != $details["password"]) {

                    $errors = "invalid password";
                }
            }
            if(!empty($errors)){
                print_r($errors);
                exit;
            }else{
                $_SESSION['current_user'] = $details;
                header("Location: myaccount.php");
                die();
            }
        }
    }
}

echo "
<body>
<div id='wrapper'>

<div id='content'>

<h2>Login</h2>
<div id='left-nav'>";


echo "
</div>
<div id='main'>";


echo "
<div id='regbox'>
<form name='login' action='".$_SERVER['PHP_SELF']."' method='post'>
<p>
<label>Username:</label>
<input type='text' name='username' required/>
</p>
<p>
<label>Password:</label>
<input type='password' name='password' required />
</p>
<p>
<label>&nbsp;</label>
<input type='submit' value='Login' class='submit' />
</p>
</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
