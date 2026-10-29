<?php
session_start();
if(!isset($_SESSION['user'])){ header('Location: login.php'); exit; }
function requireRole($role){
 if(!isset($_SESSION['role']) || $_SESSION['role']!=$role){ die('Access denied'); }
}
?>