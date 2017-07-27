<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/21/2016
 * Time: 13:48
 */
require_once ("header.php");
require_once ("config.php");
if(!isset($_SESSION))
{
    session_start();
}
$productId =$_GET['ProductID'];
if(isset($_SESSION['current_user']['username'])){
     $data = fetchProduct($productId);
    if(count($data) == 0){
        $data = [];
    }

}else {

    header("Location: bid.php");
}

if(isset($_POST['submit'])) {
    $productID = $_POST['productID'];
    $userid = $_SESSION['current_user']['user_id'];
    $name = $_POST['Name'];
    $BasePrice= $_POST['BasePrice'];
    $bidAmount= $_POST['bidAmount'];

        if(true)
        {
            $data['productID'] = $productID;
            $data['Name'] = $name;
            $data['user_id'] = $userid;
            $data['BasePrice'] = $BasePrice;
            $data['bidAmount'] = $bidAmount;

            if(processBid1($data)) {
                echo "<h2>bid processed successfully</h2>";
                header("Location: your_item.php");
                die();
            }else {
                echo "Some Error";
            }
        }

}

    ?>
<html>
<head><title>Bidding Page</title></head>
<body>
<form method="post" action="">
<div class="container">
    <?php foreach($data as $item){?>

<table>
            <img class="img-responsive" style="height: 220px" src="images/<?php echo $item['Name']; ?>.jpg">
            <div class="container">
                <div class='col-sm-10'>
        <tr>
            <td> Product ID: </td>
            <td>
                <input type="text" name="productID" value="<?php print $item['productID']; ?>">
            </td>
        </tr>
        <tr>
            <td> Name: </td>
            <td>
                <input type="text" name="Name" value="<?php print $item['Name']; ?>">
            </td>
        </tr>
                    <tr>
                        <td> Base Price: </td>
                        <td>
                            <input type="text" name="BasePrice" value="<?php print $item['BasePrice']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> Description: </td>
                        <td>
                            <input type="text"  name="description" value="<?php print $item['description']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> bidAmount: </td>
                        <td>
                            <input type="text" name="bidAmount" >
                        </td>
                    </tr>

                    <tr><td><button type="submit" name="submit" value="submit" class="btn btn-default">Submit Bid</button>
                        </td></tr>
                </div>
            </div>
</table>
<?php }; ?>
</div>
</form>
</body>
</html>
<?php

?>