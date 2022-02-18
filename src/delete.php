<?php
session_start();
if(array_values($_GET)[0] == 'Delete')
{
    foreach ($_SESSION['cart'] as $key => $value) 
    {   
        if($value['id']== array_keys($_GET)[0])
        {
        unset($_SESSION['cart'][$key]);
        } 
    }
}

if(array_values($_GET)[0] == 'Edit')
{
    
}

include 'cart.php';
display2();



?>