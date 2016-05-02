<html>

</html>


<?php
include ("account.php") ;


$connection = mysqli_connect($hostname, $username, $password, $password);

session_start();
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";


echo $id ;

/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
 
if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = array();
}
 
// check if the item is in the array, if it is, do not add
//if(array_key_exists($id, $_SESSION['cart_items'])){
	
    // redirect to product list and tell the user it was added to cart
//	echo '<script type="text/javascript">alert("This photo is already in your cart");</script>';
//	die();
    //header('Location: index.html');
//}
 
// else, add the item to the array
//{
    $_SESSION['cart_items'][$id]=$id;
 
    // redirect to product list and tell the user it was added to cart
	
	echo '<script type="text/javascript">alert("This photo has been added to your cart");</script>';
    //header('Location: index.html');
//}
?>