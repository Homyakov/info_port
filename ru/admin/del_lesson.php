<?php 
/************************************************************
*�����������: ������� �.�.   ������� �.�.
*�������:8(999)710 19 50,8(965) 065 91 98 
*�� ���� ��������� ������ ������ � ����� ��������
*������������ � ������� ������ ������ ����� ����� ��� �������� 
*��� ������� �� ������ "������ ����" � ������� ����� ���������� ������� post � ���� drop_lesson.php ���������� 
*id �� �������� ��������������� ���������� �����
***************************************************************/
include ("lock.php");
include ("bloks/bd.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������� �����</title>
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

        <td valign="top" id="telo">
          <p><strong>�������� ���� ��� ��������          </strong></p>
          <form action="drop_lesson.php" method="post">        
            <?php 
		

$result = mysql_query("SELECT title,id FROM lessons");       
$myrow = mysql_fetch_array($result);

do {
printf ("<p><input name='id' type='radio' value='%s'><label>%s</label> </p>",$myrow["id"],$myrow["title"]);

}
while ($myrow = mysql_fetch_array($result));



 ?>       
 <p><input name="submit" type="submit" value="������� ����" /></p>           
 </form>           
            
          </p></td>
      </tr>
    </table></td>
  </tr>
<!--����������� ������� ������������ �����-->  
  <?php include ("bloks/footer.php"); ?>
</table>
</body>
</html>
