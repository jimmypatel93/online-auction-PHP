<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/14/2016
 * Time: 21:31
 */
require_once ("header.php");
require_once ("config.php");

$thisuser = $_SESSION['current_user']['user_id'];
//echo $thisuser;
$founduser = fetchThisUser($thisuser);
/**
 * echo "<pre>";
 * print_r($founduser);
 * echo "</pre>";
*/
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
    Product Description
</title>

</head>
<body>

<form name="getUserDetails" method="get" action="">
<table class="table-style-three">
  <?php
  foreach ($founduser as $userdetails) { ?>
      <img class="img-responsive" style="height: 220px" src="images/<?php echo $userdetails['Name']; ?>.jpg">
    <tr><td>Name :</td>      <td><input type="text" name="Name" value="<?php print $userdetails['Name']; ?>"></td></tr>
    <tr><td>Base Price:</td>  <td><input type="text" name="BasePrice" value="<?php print $userdetails['BasePrice']; ?>"></td></tr>
    <tr><td>Description :</td>          <td><input type="text" name="description" value="<?php print $userdetails['description']; ?>"></td></tr>
    <tr><td>date :</td>            <td><input type="text" name="date" value="<?php print $userdetails['date']; ?>"></td></tr>

<?php } ?>
</table>

</form>


</body>
</html>