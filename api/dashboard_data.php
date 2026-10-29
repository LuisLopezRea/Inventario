<?php include '../config.php'; header('Content-Type: application/json');
$brands=[];$locations=[];
$r=$conn->query("SELECT brand,COUNT(*) total FROM printers GROUP BY brand"); while($x=$r->fetch_assoc()) $brands[]=$x;
$r=$conn->query("SELECT location,COUNT(*) total FROM printers GROUP BY location"); while($x=$r->fetch_assoc()) $locations[]=$x;
echo json_encode(['brands'=>$brands,'locations'=>$locations]);