<?php include "config.php";
include "audit_functions.php";

 $id=(int)($_GET['id']??0);
 $d=['inventory_id'=>'',
 'brand'=>'',
 'model'=>'',
 'serial_number'=>'',
 'ip_address'=>'',
 'location'=>'',
 'observations'=>''];
 
 if($id)
 {
	 $d=$conn->query("SELECT * FROM printers WHERE id=$id")->fetch_assoc();
	 }

 
 if($_POST){$inventory=$_POST['inventory_id'];
 $brand=$_POST['brand'];
 $model=$_POST['model'];
 $serial=$_POST['serial_number'];
 $ip=$_POST['ip_address'];
 $location=$_POST['location'];
 $obs=$_POST['observations'];
 
 if($id){$s=$conn->prepare('UPDATE printers SET inventory_id=?,brand=?,model=?,serial_number=?,ip_address=?,location=?,observations=? WHERE id=?');
 $s->bind_param('sssssssi',$inventory,$brand,$model,$serial,$ip,$location,$obs,$id);}
 
 writeAudit(
$conn,
$_SESSION['user'],
'UPDATE',
$inventory,
'Impresora actualizada'
);
 
 else {$s=$conn->prepare('INSERT INTO printers(inventory_id,brand,model,serial_number,ip_address,location,observations) VALUES(?,?,?,?,?,?,?)');
 $s->bind_param('sssssss',$inventory,$brand,$model,$serial,$ip,$location,$obs);}
 $s->execute();
 
 writeAudit(
$conn,
$_SESSION['user'],
'CREATE',
$inventory,
'Nueva impresora creada'
);
 header('Location: inventory.php');

 exit;}

 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
 </head>
 
 <body class="container mt-4">
 
 <h2>Impresora</h2>
 
 <form method="post">
 
 <input class="form-control mb-2" name="inventory_id" value="<?=$d['inventory_id']?>" placeholder="Inventory ID">
 <input class="form-control mb-2" name="brand" value="<?=$d['brand']?>" placeholder="Marca">
 <input class="form-control mb-2" name="model" value="<?=$d['model']?>" placeholder="Modelo">
 <input class="form-control mb-2" name="serial_number" value="<?=$d['serial_number']?>" placeholder="Serie">
 <input class="form-control mb-2" name="ip_address" value="<?=$d['ip_address']?>" placeholder="IP">
 <input class="form-control mb-2" name="location" value="<?=$d['location']?>" placeholder="Ubicacion">
 <textarea class="form-control mb-2" name="observations"><?=$d['observations']?>
 
 </textarea>
 
 <button class="btn btn-success">Guardar</button>
 
 </form>
 
 </body>
 
 </html>