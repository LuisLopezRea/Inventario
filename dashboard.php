<?php include "config.php"; if(!isset($_SESSION['user'])) die('Login required');
$total=$conn->query("SELECT COUNT(*) c FROM printers")->fetch_assoc()['c'];
?><!DOCTYPE html><html><head><meta charset="utf-8"><title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head><body><div class="container mt-4"><h1>Printer Inventory Dashboard</h1>
<div class="row mb-3"><div class="col-md-3"><div class="card"><div class="card-body"><h5>Total</h5><h2><?php echo $total; ?></h2></div></div></div></div>
<div class="row"><div class="col-md-6"><canvas id="brandChart"></canvas></div><div class="col-md-6"><canvas id="locationChart"></canvas></div></div>
<a href="inventory.php" class="btn btn-primary mt-3">Inventario</a></div>
<script src="assets/js/dashboard.js"></script></body></html>