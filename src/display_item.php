<div id="main">
	<div id="products">
        <form action = "display_item.php" method="get">

<?php


foreach($array_of_object as $k1 => $v1)
{   
    echo '<div id="'.$v1["id"].'" class="product">
        <img src="/images/'.$v1["image"].'" name = "/images/'.$v1["image"].'">
        <h3 class="title">
        <a href="#">'.$v1["id"].'</a>
        </h3>
        <span>Price: '.$v1["price"].'</span>     
        <a class="add-to-cart" href="?id='.$v1["id"].'&price='.$v1["price"].'&image='.$v1["image"].'&name='.$v1["name"].'">Add To Cart</a>
        </div>';
}
?>

</form>
	</div>
</div>


<?php

$id1=$_GET['id'];
$price1=$_GET['price'];
$image1=$_GET['image'];
$name1 =$_GET['name'];




if(isset($_GET['id'])) {
  
    if(exist())
    {
        update();
    }
    else
    {
        $p1=array("id"=>"$id1","price"=>$price1,"name"=>$name1,"quantity"=>1);
        array_push($_SESSION['cart'],$p1);
    }
  }
  else 
  {
     $_SESSION['cart']=array();
  }
 

function update()
{
    foreach ($_SESSION['cart'] as $key => $value) 
    {   
        if($value['id']== $_GET['id'])
        {
            $_SESSION['cart'][$key]['quantity']++;
            $_SESSION['cart'][$key]['price'] = $_SESSION['cart'][$key]['price'] + $_GET['price'];
          //  print_r($_SESSION['cart'][$key]['quantity']);
        } 
    }
}



function exist()
{
    foreach ($_SESSION['cart'] as $key => $value) 
    {   
        if($value['id']== $_GET['id'])
        {
          //  return $value['quantity']++;
            return true;
        }      
  }
 return false;
}


?>

