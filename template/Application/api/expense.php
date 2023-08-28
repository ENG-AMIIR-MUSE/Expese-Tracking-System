<?php
include('../config/conn.php');
header('Content-type:application/json');
// insert api 
//


if(isset($_POST['action'])){

    $action = $_POST['action'];
}

function registerUser($con){
    $data = array();
    $generated_id   = generateId($con);
    extract($_POST);
    $file_name   = $_FILES['image']['name'];
    $file_type =  $_FILES['image']['type'];
    $file_size  = $_FILES['image']['size'];
    $save_name = $generated_id .".png";
    $error_message   = array() ;

    $max_size   = 5 * 1024 * 1024;  
    $allowed_extensions   = ['image/jpeg','image/png','image/jpg'];
    if(in_array($file_type,$allowed_extensions)){
        if($file_size > $max_size){
            $error_message[] = "The file you uploaded it's very big try another one ";
        }
    }else{
        $error_message[] =  "This file is not suppoerted please upload another one ";
    }

    if(count($error_message) > 0){
      $data[] =  array('status'=>false,'data'=>$error_message);
    }else{
        $query    = "INSERT INTO `users`(`id`, `user_name`, `password`, `image`)
         VALUES ('$generated_id','$username',MD5('$password'),'$save_name')";
        $result  = $con->query($query);
        // check result
        if($result){
           move_uploaded_file($_FILES['image']['tmp_name'], '../uploaded/'.$save_name);
           $data = array('status'=>true,'data'=>"Registered Success");

          
        }else{
            $data = array('status'=>false,'data'=>$con->error);
        }

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
function generateId($conn){
    $data  = arraY();
    $id  = '';
    extract($_POST);
    $query = "select * from users  order by users.id  desc limit 1   ";
    $result  = $conn->query($query);
    if($result){
        $num_rows  =  $result->num_rows;
       if($num_rows > 0){
           $row   = $result->fetch_assoc();
           $id  =  ++$row['id'];
           
        }else{
            $id   = "USER001";
        }
      
    }else{
        $data = array('status'=>false, 'data'=>$conn->error);


    }
  return $id ;
}
function delete($con){
    $data = array();
    extract($_POST);
    $query    = "call registerExpense('$id','
    ' ,'', '', '','','$oper')";
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

// get user Statement
function getUserStatement($conn){
    $data  = arraY();
    extract($_POST);
    $query = "CALL getUserStatement('user1','$from','$to')";
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