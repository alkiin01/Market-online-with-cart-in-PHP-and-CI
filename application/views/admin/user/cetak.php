<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body{
			font-family: Arial;
			font-size: 12px;
		}
		.cetak{
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
		}
		td,tr{
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th{
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1{
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
			body{
			font-family: Arial;
			font-size: 12px;
		}
		.cetak{
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
		}
		td,tr{
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th{
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1{
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>
<body onload="print();">
	<div class="cetak">
		<h1>DETAIL TRANSASKSI PENGGUNA <?php echo $site->namaweb; ?></h1>
		<table class="table table-responsive table-hover" >
		<thead>
	<tr>
		<th>Nama Pelanggan</th>
		<th>: <?php echo $pel->nama_pelanggan ?></th>
	</tr>
	<tr>
		<th>Email</th>
		<th>: <?php echo $pel->email ?></th>
	</tr>
	<tr>
		<th>Telepon</th>
		<th>: <?php echo $pel->telepon ?></th>
	</tr>
	<tr>
		<th>Alamat</th>
		<th>: <?php echo $pel->alamat ?></th>
	</tr>
	<tr>
		<th>Tanggal Daftar</th>
		<th>: <?php echo $pel->tanggal_daftar ?></th>
	</tr>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Total Harga Item</th>
		<th>Jumlah item</th>
		<th>Tanggal Transaksi</th>
		<th>Status</th>
	</tr>
	</thead>
		<tbody>
	<?php $no=1; foreach($pelanggan as $pelanggan){?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $pelanggan->kode_transaksi ?></td>
		<td><?php echo number_format($pelanggan->jumlah_transaksi); ?></td>
		<td><?php echo $pelanggan->total_item ?></td> 
		<td><?php echo date('d-m-Y',strtotime($pelanggan->tanggal_transaksi)); ?></td>
		<td><?php echo $pelanggan->status_bayar ?></td>
		

	</tr>
	<?php $no++; }?>
	</tbody>
	</table>
		
	
	</div>

</body>
</html>