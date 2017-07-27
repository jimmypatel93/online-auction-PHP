<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/9/2016
 * Time: 19:55
 */

require_once("config.php");


//Forms posted
if(!empty($_POST))
{

    $errors = array();
    $username = trim($_POST["username"]);
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);

    if($username == "")
    {
        $errors[] = "enter valid username";
    }

    if($firstname == "")
    {
        $errors[] = "enter valid first name";
    }

    if($lastname == "")
    {
        $errors[] = "enter valid last name";
    }

    if($password == "")
    {
        $errors[] = "enter valid password";
    }


    if($email == "")
    {
        $errors[] = "enter valid email address";
    }


    //End data validation
    if(count($errors) == 0)
    {

        $user = createNewUser($username, $firstname, $lastname, $password, $email);
        if($user <> 1){
            $errors[] = "registration error";
        }
    }
    if(count($errors) == 0) {
        $successes[] = "registration successful";
    }
}

require_once("header.php");
echo "
<body>
<div id='wrapper'>

<div id='content'>

<h2>Register</h2>

<div id='left-nav'>";

echo "
</div>

<div id='main'>";


echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>
        <label class='col-sm-2 control-label'>Username</label>
        <div class='col-sm-10'>
            <input style='margin-bottom: 1em;padding: 0 16px;' type='text' name='username' id='user'/ placeholder=\"Username\"><br>
        </div>

        <label class='col-sm-2 control-label'>First Name</label>
        <div class='col-sm-10'>
            <input style='margin-bottom: 1em;padding: 0 16px;' type='text' name='firstname' placeholder='First Name'/><br>
        </div>

        <label class='col-sm-2 control-label'>Last Name</label>
        <div class='col-sm-10'>
            <input style='margin-bottom: 1em;padding: 0 16px;' type='text' name='lastname' placeholder='Last Name'/><br>
        </div>

        <label class='col-sm-2 control-label'>Password</label>
        <div class='col-sm-10'>
            <input style='margin-bottom: 1em;padding: 0 16px;' type='password' name='password' placeholder='Password' /><br>
        </div>


        <label class='col-sm-2 control-label'>Email Address</label>
        <div class='col-sm-10'>
            <input style='margin-bottom: 1em;padding: 0 16px;' type='text' name='email' placeholder='Email Address '/><br>
        </div>

        <div class='col-sm-4 text-center '>
            <input style='margin-bottom: 1em;padding: 0 16px;' type='submit' value='Register'/>
        </div>
</form>
</div>

</div>
<div id='bottom'></div>
</div>

</body>
</html>";
?>
