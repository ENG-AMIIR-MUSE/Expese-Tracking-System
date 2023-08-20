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
    $query    = "call registerExpense('','$amount','$type','$descripton','user1','','$oper')";
    $result  = $con->query($query);
    // check result
    if($result){
        $row  = $result->fetch_assoc();
        if(isset($row['message'])){
        $data = array('status'=>true,'data'=>$row['message']);
        }else{
            $data = array('status'=>true,'data'=>"message is not exits ");
        }
    }else{
        $data = array('status'=>false,'data'=>$con->error);
    }

    echo json_encode($data);
};
function update($con){
    $data = array();
    extract($_POST);
    $query    = "call registerExpense('$id','$amount','$type','$descripton','user1','','$oper')";
    $result  = $con->query($query);
    // check result
    if($result){
        $row  = $result->fetch_assoc();
        if(isset($row['message'])){
        $data = array('status'=>true,'data'=>$row['message']);
        }else{
            $data = array('status'=>true,'data'=>'we dont know the message');
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
// 
function readOneTransaction($conn){
    $data  = arraY();
    extract($_POST);
    $query = "select * from exp  where exp.id =  '$id' ";
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

function delete($con){
    $data = array();
    extract($_POST);
    $query    = "call registerExpense('$id','' ,'', '', '','','$oper')";
    $result  = $con->query($query);
    // check result
    if($result){
        $row  = $result->fetch_assoc();
        if(isset($row['message'])){
        $data = array('status'=>true,'data'=>$row['message']);
        }else{
            $data = array('status'=>false,'data'=>'cant delete');
        }
    }else{
        $data = array('status'=>false,'data'=>$con->error);
    }

    echo json_encode($data);
};
if($action){
    $action($con);
}else{
    echo json_encode(array('status'=>false,'data'=>'action required !!'));

}



?>