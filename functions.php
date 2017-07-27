<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/9/2016
 * Time: 15:16
 */
if(!isset($_SESSION)){
    session_start();
}


function fetchThisUserbyID($userid)
{

    global $mysqli;
    $row = array();
    $stmt = $mysqli->prepare(
        "
    SELECT
    user_id,
    FirstName,
    LastName,
    username,
    emailid,
    date

    FROM user
    WHERE
    user_id = ?"
    );
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result( $FirstName, $LastName, $username, $password, $emailid, $date);
    $stmt->execute();
    while ($stmt->fetch()) {
        $row[] = array(
            'user_id'                      => $userid,
            'FirstName'         => $FirstName,
            'LastName'                => $LastName,
            'username'                    => $username,
            'password'                     => $password,
            'emailid'               => $emailid,
            'date'             => $date

        );
    }
    $stmt->close();
    return ($row);
}

/**
 * Display all the products

 */
    function fetchAllData()
    {
        global $mysqli, $db_table_prefix;
        $row = array();
        $stmt = $mysqli->prepare(
              "SELECT
                ProductID,
                Name,
                BasePrice,
                description,
                date
        
                FROM " . $db_table_prefix . "product WHERE active = 1"
          );
          $stmt->execute();
          $stmt->bind_result(
              $ProductID,
              $name,
              $BasePrice,
              $description,
              $date
          );

          while ($stmt->fetch()) {
              $row [] = array(
                  'ProductID'           => $ProductID,
                  'Name'                      => $name,
                  'BasePrice'               => $BasePrice,
                  'description'                => $description,
                  'date'                    => $date

              );
          }
          $stmt->close();
          return ($row);
}

    function createNewUser($username, $firstname, $lastname, $password, $email) {
        global $mysqli;
        //Generate A random userid

        $character_array = array_merge(range('a', 'z'), range(0, 9));
        $rand_string = "";
        for ($i = 0; $i < 6; $i++) {
            $rand_string .= $character_array[rand(
                0, (count($character_array) - 1)
            )];
        }

                    $stmt = $mysqli->prepare(
                        "INSERT INTO user (
              user_id,
              FirstName,
              LastName,
              username,
              password,
              emailid,
              date,
               Active
             )
              VALUES (
              '" . $rand_string . "',
              ?,
              ?,
              ?,
              ?,
              ?,
              '". date("d-M-Y  H:i:s")  . "',
              1
              )                 ");
                    $stmt->bind_param("sssss",$firstname,$lastname,$username,$password,$email);
                $result = $stmt->execute();
                $stmt->close();
                return $result;

            if ($result == 1)
            {
                $newUser = fetchThisUserbyID($rand_string);
                echo "<b><br>Values of new user: </b><table>";
                foreach ($newUser[0] as $user => $userValue)
                {
                    echo "
                <tr>
                    <td>$user</td>
                    <td>$userValue</td>
                </tr>
                ";
                }
                echo "</table>";
            }

            return $result;

    }





function fetchUserDetails($username)
{
   global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("
    SELECT 
            user_id,
            FirstName,
            LastName,
            username,
            password,
            emailid,
            date,
            Active
    FROM user
    WHERE
    username = ?" );

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result( $userid, $FirstName, $LastName, $username, $password, $emailid, $date, $Active);
    $stmt->execute();
    while ($stmt->fetch()) {
        $row[] = array(
            'user_id'           => $userid,
            'FirstName'         => $FirstName,
            'LastName'          => $LastName,
            'username'          => $username,
            'password'          => $password,
            'emailid'           => $emailid,
            'date'              => $date,
            'Active'            =>$Active

        );
    }
    $stmt->close();
    return ($row);

}

 function Logout()
{
    session_destroy();
    header("Location: index.php");
}


//fetch particular users record

/**
 * @param $userid
 *
 * @return array
 */
function fetchThisUser($userid)
{
    global $mysqli;
    $row = array();
    $stmt = $mysqli->prepare(
        "
    SELECT
    Name,
    BasePrice,
    description,
    date

    FROM product
    WHERE
    user_id = ?"
    );
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($name, $BasePrice, $description, $date);
    $stmt->execute();
    while ($stmt->fetch()) {
        $row[] = array(
            'Name'                      => $name,
            'BasePrice'                => $BasePrice,
            'description'                    => $description,
            'date'             => $date

        );
    }
    $stmt->close();
    return ($row);
}

function addNewProduct($data)
{
    global $mysqli,$db_table_prefix;

    $query = "INSERT INTO `product`(`user_id`,`Name`, `BasePrice`, `description`,`active`, `date`) VALUES ('$data[user_id]','$data[Name]', '$data[BasePrice]', '$data[description]','1','". date("d-M-Y  H:i:s")  . "')";

    $q = mysqli_query($mysqli,$query);
    if($q) {
        return true;

    }else {

        return false;
    }


}

function fetchProductUsingUserID($userid)
{
    $row = array();
    global $mysqli,$db_table_prefix;

    $stmt = $mysqli->prepare("
    SELECT 
            ProductID,
            user_id,
            Name,
            BasePrice,
            description,
            active,
            date
    FROM product
    WHERE
    user_id = ?" );

    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($productID,$userid,$Name,$BasePrice,$description,$Active,$date);
    $stmt->execute();
    while ($stmt->fetch()) {
        $row[] = array(
            'productID'         => $productID,
            'user_id'           => $userid,
            'Name'         => $Name,
            'BasePrice'          => $BasePrice,
            'description'          => $description,
            'active'            =>$Active,
            'date'              => $date

        );
    }
    $stmt->close();
    return ($row);

}
function fetchProduct($productId)
{
    $row = array();
    global $mysqli,$db_table_prefix;

    $stmt = $mysqli->prepare("
    SELECT 
            ProductID,
            user_id,
            Name,
            BasePrice,
            description,
            active,
            date
    FROM product
    WHERE
    ProductID = ?" );

    $stmt->bind_param("s", $productId);
    $stmt->execute();
    $stmt->bind_result($productID,$userid,$Name,$BasePrice,$description,$Active,$date);
    $stmt->execute();
    while ($stmt->fetch()) {
        $row[] = array(
            'productID'         => $productID,
            'user_id'           => $userid,
            'Name'         => $Name,
            'BasePrice'          => $BasePrice,
            'description'          => $description,
            'active'            =>$Active,
            'date'              => $date

        );
    }
    $stmt->close();
    return ($row);

}


function processBid1($data)
{
    global $mysqli,$db_table_prefix;

    $query = "INSERT INTO `bid`(`ProductID`,`user_id`,`name`, `basePrice`, `bidAmount`) VALUES ('$data[productID]','$data[user_id]', '$data[Name]', '$data[BasePrice]','$data[bidAmount]')";

    $q = mysqli_query($mysqli,$query);
    if($q) {
        return true;

    }else {

        return false;
    }

}
function deleteproduct($productID)
{
    global $mysqli;
    $stmt = $mysqli->prepare("
    UPDATE product SET active=0 WHERE productID = ?");

    $stmt->bind_param("s",$productID);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}
?>