<!DOCTYPE html>
<script>
	document.addEventListener('DOMContentLoaded', function() {
let table = new DataTable('#dt-data_getar', {
pageLength: 5,
lengthMenu: [
 [5, 10, 20, 25],
 [5, 10, 20, 25]
 ],

order: [
 [0, 'desc']
 ],
 ajax: function(d, cb) {
 fetch('api_getar.php')
 .then(response => response.json())
 .then(data => cb(data));
 },

 columns: [{
 data: 'time_update'
 },
 {
 data: 'nilai_getar'
 },
 {
 data: 'kondisi_mesin'
 }
],
 "columnDefs": [{
 "targets": "_all",
 "className": "dt-center"
 },
 {
 "targets": [3],
 	render: function(data, type, row) {
 		if (row.nilai_getar > 0 && nilai_getar < 910) {
 			return '<button class="btn btn-success btn-block"><strong><i class="fa-solid fa-fire"></i> 
 			Aman </strong> </button>';

 		} else if(row.nilai_getar > 910 && nilai_getar < 945){
 			return '<button class="btn btn-warning btn-block"><strong><i class="fa fa-check"></i>
 			Diperbolehkan</strong></button>';
 		
 		} else if(row.nilai_getar > 945 && nilai_getar < 984){
 			return '<button class="btn btn-secondary btn-block"><strong><i class="fa fa-check"></i>
 			Lumayan</strong></button>';
 		
 		}else if(row.nilai_getar > 984 && nilai_getar < 1024){
 			return '<button class="btn btn-danger btn-block"><strong><i class="fa fa-check"></i>
 			Bahaya</strong></button>';
 		}

 			}

 		}
 		]
 	});
});
</script>



<script src="https://code.jquery.com/jquery3.5.1.js"></script>
<script 
src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables
.min.js"></script>
<link rel="stylesheet" 
href="https://cdn.datatables.net/1.12.1/css/jquery.dataTabl
es.min.css">


<div class="card">
	<div class="card-header">
		<h3 class="card-title">Hasil Data Getar
		</h3>
		<div class="d-flex justify-content-end mb-3">
			
		</div>
	</div>



	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Waktu/Tanggal</th>
					<th>Nilai Getar</th>
					<th>Kondisi Mesin</th>
				
				</tr>
			</thead>
			<tbody>

				<?php
				include 'koneksi.php';
				$query_tampil = mysqli_query($koneksi,"SELECT * FROM `sensor_getar`");
				$no = 1;
				while ($data = mysqli_fetch_array($query_tampil)) {

					?>	
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $data['time_update']?></td>
						<td><?php echo $data['nilai_getar']?></td>
						<td><?php echo $data['kondisi_mesin']?></td>
						
							
						</td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>


