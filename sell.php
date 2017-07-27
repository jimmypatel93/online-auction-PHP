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

if(isset($_POST['submit'])) {
    $id = $_SESSION['current_user']['user_id'];
    $name = $_POST['Name'];
    $basePrice = $_POST['BasePrice'];
    $description= $_POST['description'];
    $file = $_FILES['file'];
    $targetDir = "images/";
    $targetFile = $targetDir.basename($name.".jpg");
    chmod($targetDir, 777);
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)){
        // echo "File uploaded Successfully";
        $data['user_id'] = $id;
        $data['Name'] = $name;
        $data['BasePrice'] = $basePrice;
        $data['description'] = $description;


        if(addNewProduct($data)) {
            echo "File Uploaded";
            header("Location: your_item.php");
            die();
        }else {
            echo "Some Error";
        }

    }else {
        echo "File Not Uploaded<br>";
    }


}

?>
<html>
<head>
    <title>Add new product</title>
</head>
<body>
    <div id='wrapper'>

        <div id='content'>

            <h2>Add New Product</h2>


            <div id='main'>
                <div id='regbox'>
                    <form name='newProduct'enctype="multipart/form-data" action="" method="post" >
                    <label class='col-sm-2 control-label'>Name</label>
                    <div class='col-sm-10'>
                        <input style='margin-bottom: 1em;padding: 0 16px;' type='text' name='Name' id='Name' placeholder="Name"><br>
                    </div>

                    <label class='col-sm-2 control-label'>Base Price</label>
                    <div class='col-sm-10'>
                        <input style='margin-bottom: 1em;padding: 0 16px;' type='text' name='BasePrice' placeholder='Base Price'/><br>
                    </div>

                    <label class='col-sm-2 control-label'>Description</label>
                    <div class='col-sm-10'>
                            <textarea name="description" placeholder="Description" rows="10" cols="21"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="exampleInputFile">Browse Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="exampleInputFile" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="submit" value="submit" class="btn btn-default">Upload Product</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <div id='bottom'></div>
        </div>

    </body>
    </html>






<?php include 'footer.php'; ?>