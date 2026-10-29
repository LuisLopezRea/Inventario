<?php
include "config.php";
if(isset($_FILES['csv'])){
 $f=fopen($_FILES['csv']['tmp_name'],'r');
 fgetcsv($f);
 while(($r=fgetcsv($f))!==FALSE){
  $s=$conn->prepare('INSERT INTO printers(inventory_id,brand,model,serial_number,ip_address,location,observations) VALUES(?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE brand=VALUES(brand),model=VALUES(model),serial_number=VALUES(serial_number),ip_address=VALUES(ip_address),location=VALUES(location),observations=VALUES(observations)');
  $s->bind_param('sssssss',$r[0],$r[1],$r[2],$r[3],$r[4],$r[5],$r[6]);
  $s->execute();
 }
 fclose($f);
}
header('Location: inventory.php');