<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN ART</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center">LAPORAN ART <br/> <?php echo tgl_indo($dari_tanggal); ?> -  <?php echo tgl_indo($sampai_tanggal); ?> </td>
    <td>&nbsp;</td>
  </tr>
</table>
<br/>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="7%" height="31" align="center" bgcolor="#CCCCCC">No</td>
    <td width="24%" align="center" bgcolor="#CCCCCC">Nama</td>
    <td width="21%" align="center" bgcolor="#CCCCCC">Judul</td>
    <td width="16%" align="center" bgcolor="#CCCCCC">Kategori</td>
    <td width="14%" align="center" bgcolor="#CCCCCC">Tanggal</td>
    <td width="18%" align="center" bgcolor="#CCCCCC">Deskripsi</td>
  </tr>
  <?php $no = 1; foreach($cetak_laporan as $v) { ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $v->namalengkap; ?></td>
    <td align="center"><?php echo $v->judulkarya; ?></td>
    <td align="center"><?php echo $v->namakategori; ?></td>
    <td align="center"><?php echo $v->tglkarya; ?></td>
    <td align="center"><?php echo $v->deskripsikarya; ?></td>
  </tr>
  <?php $no++; } ?>
</table>

</body>
</html>