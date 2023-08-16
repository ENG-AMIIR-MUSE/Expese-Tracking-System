<?php
$con  = new mysqli('localhost','root','','expensetrackor');
if(!$con){
    echo "failed ".$con->error;
}
?>