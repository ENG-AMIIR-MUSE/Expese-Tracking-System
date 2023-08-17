<?php
include('../config/conn.php');
// insert api 
//

function registerExpense($con){
    $message = array();
    extract($_POST);
    $query    = "call registerExpense('','$amount','$type','$descripton','User12','')";
    $result  = $con->query($query);
    if($result){
        $message = array('status'=>true,'data'=>"Expense Registered Success ");
    }else{
        $message = array('status'=>false,'data'=>$con->error);
    }

    echo json_encode($message);
}

if(isset($_POST['action'])){
    $action =  $_POST['action'];
    $action($con);
}else{
    echo json_encode(array('status'=>false,'data'=>'action required !!'));
}


?>