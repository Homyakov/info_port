<?php 
/************************************************************
*�����������: ������� �.�.   ������� �.�.
*�������:8(999)710 19 50,8(965) 065 91 98 
*����  ������������ ��� �������� ������ ������ � ������
***************************************************************/

include ("bloks/bd.php");
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='lessons'",$db);
$myrow = mysql_fetch_array ($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta name="description" content="<?php echo $myrow['meta_d']; ?>" />
  <meta name="keywords" content="<?php echo $myrow['meta_k']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������</title>
<link href="style.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

<table width="690" border="0" align="center" class="main_border" cellpadding="0" cellspacing="0">
<!--����������� ����� -->
<?php include("bloks/header.php"); ?>
  <tr>
    <td><table width="690" border="0" cellpadding="0" cellspacing="0">
  <tr>
<!--����������� ������ �����-->  
<?php include("bloks/lefttd.php"); ?>
        <td valign="top" id="telo"><p><p>� ���� ����� ������ ���� �� �������� ����� � ������� 
Rupay.</p>
<p>������, ���� � ���� ������� ����������� ��� ��� ������ 
�����. ��������, �� ������� ��� ������� �������� � ��������� �������� 
������, ���������� �������, ��������� ������ �� ����� �������� � ��.</p>
<p>�������� ������� �������� ����� �� �����:</p>
<p><strong>1.</strong> �������� �� ������ - <a href="http://ruseller.com/p/rupay.php" target="_blank">������� 
���� � Rupay</a></p>
</p>
<div align="center"><img src="lessons/280807/ruplay/1.gif" width="212" height="108" />
</div>
<p><strong>2.</strong> �� ����������� �������� ����� �� 
������ � ������ ����,��������� �� �������:</p>
<p align="center"><img src="lessons/280807/ruplay/2.gif" width="219" height="98" /></p>
<p><strong>3.</strong> �����, ���������� ��������������� 
����� � ����� ������: &quot;�����������&quot;.</p>
<p align="center"><img src="lessons/280807/ruplay/3.gif" width="214" height="91" /></p>
<p><strong>4.</strong> ����, ���� �� ������ ������ �� 
�� ����� ���������� �����, ������� �� ������ �� ���������. ��������� 
���� ����� ���������� ��������� ��������. ��������� �� ���� �� ������� 
���� ������� �� ������ &quot;��������� ����&quot;.</p>
<p align="center"><img src="lessons/280807/ruplay/4.gif" width="236" height="86" /></p>
<p align="center"><img src="lessons/280807/ruplay/5.gif" width="168" height="86" /></p></td>
      </tr>
    </table></td>
  </tr>
<!--����������� ������� ������������ �����-->  
  <?php include ("bloks/footer.php"); ?>
</table>
</body>
</html>
