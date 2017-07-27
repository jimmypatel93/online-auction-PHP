<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/20/2016
 * Time: 23:47
 */
require_once ("header.php");
require_once ("config.php");

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION['current_user']['username'])){
    $data = fetchAllData();

    if(count($data) == 0){
        $data = [];
    }

}else {

    header("Location: index.php");
}
?>
<div class="container">
    <?php foreach($data as $item){?>

        <div class="col-md-3 col-sm-4 col-xs-6" style="background-color: #00A7E1;padding: 5px;margin: 5px;height: 360px;width: 250px">

            <div class="card">

                <img class="img-responsive" style="height: 220px" src="images/<?php echo $item['Name']; ?>.jpg">
                <div class="rating"  style="margin: 5px">
                    <p>Prodcut ID: <a href="productBid.php?ProductID=<?php print $item['ProductID']; ?>"> <?php echo $item['ProductID'];?></a>
                    </p>
                </div>
                <div class="container">
                    <h5><b><?php echo $item['Name']; ?> </b></h5>
                    <p>Base Price: $<?php echo $item['BasePrice'];?>
                    </p>
                    <p>Description: <?PHP echo  $item['description']?></p>
                </div>
            </div>

        </div>

    <?php }; ?>
</div>
