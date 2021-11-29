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
		<?php foreach ($total as $total){  ?>
		
<?php } ?>
		<h1>DETAIL TRANSASKSI PADA TANGGAL <?php echo date('d-m-Y',strtotime($total->tanggal_transaksi)) ?></h1>
		<table class="table table-responsive table-hover" >

	<table class="table table-responsive" id="example2">
<thead>
<tr>
	<th colspan= 2>Total jumlah pembayaran</th>
	<th><?php echo number_format($total->total_harga); ?></th>
</tr>
<tr><td></td></tr>
</thead>
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Kode</th>
			<th>Total item
			<th>Total Harga Item</th>
			<th>Tanggal Transaksi</th>
			<th>Status</th>
		</tr>
	</thead>
		
	<tbody>
		<?php $i=1; foreach($harga as $harga){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><strong><?php echo $harga->nama_pelanggan; ?></strong><br>
			<small>Telepon : <?php echo $harga->telepon  ?></small><br>
			<small>email :<?php echo $harga->telepon ?> </small><br>
			<small>Alamat kirim : <br><?php echo $harga->alamat ?></small>
			</td>
			<td><?php echo $harga->kode_transaksi; ?></td>
			<td><?php echo $harga->total_item ?></td>
			<td><?php echo number_format($harga->jumlah_transaksi); ?></td>
			
			<td><?php echo date('d-m-Y',strtotime($harga->tanggal_transaksi)); ?></td>
			<td><?php echo $harga->status_bayar ?></td>

		</tr>
		
	<?php $i++; } ?>
	

	</tbody>
</table>
	</div>

</body>
</html>