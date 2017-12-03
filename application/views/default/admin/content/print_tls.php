<body onload="javascript:window.print()">
<style type="text/css">
.table {
	font-size: 12px;
    border-collapse: collapse;
    width: 100%;
    font-family: Arial;
    border: 1px solid black;
}

.table, .table th, .table td {
	padding: 4px;
    border: 1px solid black;
}
.tb {
	border: 1px solid #ff;
}
.tr {
	background: #000;
	color: #fff;
}

.table2 {
	font-size: 12px;
    border-collapse: collapse;
    width: 100%;
    font-family: Arial;
}

.table2, .table2 th, .table2 td {
	padding: 4px;
    border: 1px solid black;
}
</style>
<table width="100%" class="table" >
	<tr>
		<td rowspan="3" width="19%"><img src="<?php echo base_url();?>templates/default/admin/ptba.png" width="120"></td>
		<td rowspan="2" align="center"><strong><font size="3" >PT BUKIT ASAM (PERSERO) Tbk.</font></strong></td>
	</tr>
	<tr>
		<td>Tanggal : <?php echo dateIndo1($tls->tanggal); ?></td>
	</tr>
	<tr>
		<td align="center"><strong>PENANGANAN BATUBARA</strong></td>
		<td>Hal. : 1 Dari 1</td>
	</tr>
	<tr>
		<td align="center" colspan="3"><strong><font size="3" >BERITA ACARA</font></strong></td>
	</tr>
</table>
<table width="100%" class="table2">
	<tr>
		<td colspan="2" width="90%" align="center">Nomor<br>SA/SPH/DO/SKB/KKBW</td>
		<td>Tonase</td>
	</tr>
	<tr>
		<td colspan="2" width="90%" align="center">
          <?php echo $tls->no_dok; ?>
			</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2" width="90%">Total : Diangkut ke  : <?php echo $tls->posisi; ?> dari TLS1</td>
		<td><b><?php echo $tls->jumlah_tonase; ?> Ton</b></td>
	</tr>
	<tr>
		<td colspan="3" width="90%">Keterangan : </td>
	</tr>
	<tr align="center">
		<td width="50%"><b>PT.Kereta Api Indonesia (Persero) <br> Stasiun Besar TMB<br><br><br><br><br><br><br><br>.......................................</td>
		<td colspan="2"><b>Tanjung Enim, .....................<br>Ass, Man. Ops Penbara<br><br><br><br><br><br><br><br>....................................... </td>
	</tr>
</table>
</body>