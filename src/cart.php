<?php

function display2()
{
    $html = "";
  //  $html .= "<form action='delete.php' method='get'>"; 
    $html .= "<table>";
    $html .= "<tr><th>PRODUCT ID</th><th>PRICE</th><th>ITEM</th><th>QUANTITY</th><th>ACTION</th></tr>";
    foreach ($_SESSION['cart'] as $key => $value)
    {
        $html .= "<tr>"; 
        foreach($value as $key2 => $value2)
        {
                $html.= "<td>$value2</td>";                 
        }
       //  $html.= "<td><input type = 'submit'  name ='".$value['id']."' value = 'Delete' >&nbsp;&nbsp;<input type = 'submit' name = '".$value['id']."' value = 'Edit'></td>";
     $html.= '<td> <a class="add-to-cart" href="?id='.$value["id"].'&action=delete">DELETE</a></td>';
        $html .= "</tr>";
    }
    $html .= "</table>";
  //  $html .= "</form>";
    return $html;
}


?>

 <?php echo display2();
 

echo $_GET['action'];

if($_GET['action'] == 'delete')
{
    foreach ($_SESSION['cart'] as $key3 => $value3)
    {
       // echo $_SESSION['cart'][$key3]['id']."=======".$_GET['id'];
      //  echo "<br>";
        if($_SESSION['cart'][$key3]['id'] == $_GET['id'])
        {
           unset($_SESSION['cart'][$key3]);
          echo "true"; 
        }echo "<br>";
    }
}

print_r($_SESSION);

 ?>



