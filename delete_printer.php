<?php include "config.php";
include "audit_functions.php";
 $id=(int)$_GET['id'];
 $conn->query("DELETE FROM printers WHERE id=$id");
 writeAudit(
$conn,
$_SESSION['user'],
'DELETE',
$inventory,
'Impresora eliminada'
); 
 
 header('Location: inventory.php'); ?>