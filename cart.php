<!DOCTYPE html>
<html lang="en">
<head>
  <title>Brittani Marie Photo Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Shopping Cart</h2>
  
  
  
  

<?php


include ("account.php") ;


$con = new PDO("mysql:host=$hostname;dbname=$project", $username, $password);

echo date("h:i:sa"); echo '<br>';

session_start();
 
$page_title="Cart";
 
$action = isset($_GET['action']) ? $_GET['action'] : "";

 
if($action=='removed')
{
	$name = isset($_GET['name']) ? $_GET['name'] : "";
    echo "<div class='alert alert-info'>";
        echo '<strong>'+$name+'</strong> was removed from your cart';
    echo "</div>";
}
 
if(count($_SESSION['cart_items'])>0)
	{
 
    // get the product ids
    $ids = "";
    foreach($_SESSION['cart_items'] as $id=>$value){
        $ids = $ids . $id . ",";
        echo $ids ;  echo '<br>';
    }
    
    // remove the last comma
    $ids = rtrim($ids, ',');
    echo $ids ; echo '<br><br>';
 
    //start table
         echo'<table class="table table-bordered">';
		 echo '<tr>
        <th>Photo</th>
        <th>Price</th>
        <th>Action</th>
      	</tr>';
			
    	$query = "SELECT id, name, price FROM photos WHERE id = '$ids' ORDER BY name";
        
        echo $query; echo '<br><br>';
 
        $stmt = $con -> prepare( $query );
        $stmt -> execute();
 
        $total_price=0;
        


		
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        extract($row);
 		
 		
 		echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>&#36;{$price}</td>";
                echo '<td><a href="removefromcart.php?id={$id}&name={$name}">Remove from cart</a></td>';
                echo '</tr>' ;
 
            $total_price+=$price;
            
        }
        echo '</table>';
 
        echo 'Total:     ';
        echo $total_price;
        echo '<br><# href="checkout.html">Checkout</a>';
        
      
}
 
else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>No products found</strong> in your cart";
}
 
?>


</div>
</body>
</html>