fetch('api/dashboard_data.php').then(r=>r.json()).then(data=>{
new Chart(document.getElementById('brandChart'),{type:'pie',data:{labels:data.brands.map(x=>x.brand),datasets:[{data:data.brands.map(x=>x.total)}]}});
new Chart(document.getElementById('locationChart'),{type:'bar',data:{labels:data.locations.map(x=>x.location),datasets:[{label:'Printers',data:data.locations.map(x=>x.total)}]}});
});