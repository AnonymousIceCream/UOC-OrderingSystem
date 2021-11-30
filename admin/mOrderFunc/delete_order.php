<?php
    include('../../includes/constants.inc.php');

    $order_ID=$_GET['order_ID'];
    //Query to delete data
    $sql="DELETE FROM tbl_orders WHERE order_ID=".$order_ID;
    $res=mysqli_query($conn,$sql);
    if($res==true)
    {
        //Redirect to homepage
        $_SESSION['update'] = "<div class='success text-center'>Order deleted Successfully.</div>";
        header('location: ../manage_order.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='success text-center'>Order deletion Failed.</div>";
        header('location:'.SITEURL.'admin/manage_order.php');
    }
?>