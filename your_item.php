<?php include 'header.php'; ?>



<?php
require_once("config.php");

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION['current_user']['username'])){
    $data = fetchProductUsingUserID($_SESSION['current_user']['user_id']);

    if(count($data) == 0){
        $data = [];
    }

}else {

    header("Location: index.php");
}
if(isset($_POST['submit'])) {

    $productID = $_POST['productID'];
    $deleteProduct = deleteproduct($productID);
}
?>
<form action="" method="post">
    <div class="container">
        <?php foreach($data as $item){?>

            <div class="col-md-3 col-sm-4 col-xs-6" style="background-color: #00A7E1;padding: 5px;margin: 5px;height: 360px;width: 250px">

                <div class="card">
                    <div class="rating" align="right" style="margin: 5px">
                      <?php echo $item['productID'];?>
                    </div>
                    <img class="img-responsive" style="height: 220px" src="images/<?php echo $item['Name']; ?>.jpg">
                    <div class="container">
                        <h5><b><a href=""><?php echo $item['Name']; ?></a> </b></h5>
                        <p>Starting Price: $<?php echo $item['BasePrice'];?>
                        </p>
                        <p>Description: <?PHP echo  $item['description']?></p>

                    </div>
                </div>

            </div>

        <?php }; ?>
    </div>
</form>





<?php include 'footer.php'; ?>