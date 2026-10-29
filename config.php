<?php
session_start();
$conn=new mysqli("localhost","root","","printer_inventory");
if($conn->connect_error){die("DB Error");}
?>