<?php include "config.php"; $r=$conn->query("SELECT * FROM printers ORDER BY inventory_id");
?><!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="dashboard.php">
            Inventario IT
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="dashboard.php">
                Dashboard
            </a>

            <a class="nav-link" href="inventory.php">
                Inventario
            </a>

        </div>

    </div>
</nav>

<h2>Inventario de Impresoras</h2>

<div class="mb-3">

    <a class="btn btn-success" href="printer_form.php">
        Nueva Impresora
    </a>

    <a class="btn btn-secondary" href="export_csv.php">
        Exportar CSV
    </a>

    <a class="btn btn-primary" href="export_excel.php">
        Exportar Excel
    </a>

</div>

<form
    action="upload_csv.php"
    method="post"
    enctype="multipart/form-data"
    class="card p-3 mb-3">

    <h5>Importar Inventario CSV</h5>

    <input
        type="file"
        name="csv"
        class="form-control"
        accept=".csv"
        required>

    <button
        type="submit"
        class="btn btn-warning mt-2">

        Importar CSV

    </button>

</form>



<table class="table table-bordered table-striped"><tr><th>ID Inventario</th><th>Marca</th><th>Modelo</th><th>Serie</th><th>IP</th><th>Ubicacion</th><th>Acciones</th></tr><?php while($x=$r->fetch_assoc()){ ?><tr><td><?=$x['inventory_id']?></td><td><?=$x['brand']?></td><td><?=$x['model']?></td><td><?=$x['serial_number']?></td><td><?=$x['ip_address']?></td><td><?=$x['location']?></td><td><a class="btn btn-primary btn-sm" href="printer_form.php?id=<?=$x['id']?>">Editar</a> <a class="btn btn-danger btn-sm" href="delete_printer.php?id=<?=$x['id']?>">Eliminar</a></td></tr><?php } ?>

</table>

</body> 

</html> 

	



	

