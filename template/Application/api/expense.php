<?php
include('../config/conn.php');
header('Content-type:application/json');
// insert api 
//


if(isset($_POST['action'])){

    $action = $_POST['action'];
}

function registerExpense($con){
    $data = array();
    extract($_POST);
    $query    = "call registerExpense('','$amount','$type','$descripton','user1','')";
    $result  = $con->query($query);
    // check result
    if($result){
        $row  = $result->fetch_assoc();
        if(isset($row['msg'])){
        $data = array('status'=>false,'data'=>$row['msg']);
        }else{
            $data = array('status'=>true,'data'=>"Expense Registered Success ");
        }
    }else{
        $data = array('status'=>false,'data'=>$con->error);
    }

    echo json_encode($data);
};
// display balance of the user 


// read all Trancaction  
function readAllTransaction($conn){
    $data  = arraY();
    $query = "select * from exp ";
    $result  = $conn->query($query);
    if($result){
        while($row  = $result->fetch_assoc()){
            $data[] = $row;
        }
        $data = array('status'=>true, 'data'=>$data);
    }else{
        $data  = array('status'=>false, 'data'=>$conn->error);
    }
    echo json_encode($data);
}
if($action){
    $action($con);
}else{
    echo json_encode(array('status'=>false,'data'=>'action required !!'));

}



?>