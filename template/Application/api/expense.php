<?php
include('../config/conn.php');
header('Content-type:application/json');
// insert api 
//


if(isset($_POST['action'])){

    $action = $_POST['action'];
}

function registerExpense($con){
    $message = array();
    extract($_POST);
    $query    = "call registerExpense('','$amount','$type','$descripton','User12','')";
    $result  = $con->query($query);
    // check result
    if($result){
        $message = array('status'=>true,'data'=>"Expense Registered Success ");
    }else{
        $message = array('status'=>false,'data'=>$con->error);
    }

    echo json_encode($message);
};
if($action){
    $action($con);
}else{
    echo json_encode(array('status'=>false,'data'=>'action required !!'));

}
// if(isset($action)){

//     $action($con);
// }else{
//     echo json_encode(array('action '=>$_POST['action']));

// }


?>