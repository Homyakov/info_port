<?php 
/************************************************************
*�����������: ������� �.�.   ������� �.�.
*�������:8(999)710 19 50,8(965) 065 91 98 
*���������� title,meta_d,meta_k,data,description,text,author �������� �� ����� new_articles.php ������� post 
*����������� �������� �� ����������� ������� $_POST ����������� ����������
*����������� ������ ������ � ���� ������ � ������� articles
***************************************************************/
include ("lock.php");
include ("bloks/bd.php");
if (isset($_POST['title']))      { $title=$_POST['title']; if ($title == '') {unset($title);} }
if (isset($_POST['meta_d']))     {$meta_d=$_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))     {$meta_k=$_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['data']))       {$data=$_POST['data'];   if ($data== '') {unset($data);}}
if (isset($_POST['description'])){$description=$_POST['description'];if ($description== '') {unset($description);}}
if (isset($_POST['text']))       {$text=$_POST['text'];   if ($text== '') {unset($text);}}
if (isset($_POST['author']))     {$author=$_POST['author']; if ($author== '') {unset($author);}}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>����������</title>
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
                
                 <p>
                   <?php 
if (isset($title) && isset($meta_d)	&& isset($meta_k)&& isset($data)&& isset($description)&& isset($text)&& isset($author) )
{
/*����� �������� � ����*/
$result = mysql_query ("INSERT INTO articles (title,meta_d,meta_k,description,data,text,author) VALUES ('$title','$meta_d','$meta_k','$description','$data','$text','$author')");

if ($result == 'true') { echo "<p>���� ������ ������� ���������!</p>";}
else {echo "<p>���� ������ �� ���������</p>";}
	} 
else 
{
echo "<p>�� ��� ���� ���������,������ � ���� �� ����� ���� ��������</p>";
}				 
				 

				 ?>
                 </p>
            <p>&nbsp; </p></td>
      </tr>
    </table></td>
  </tr>
<!--����������� ������� ������������ �����-->  
  <?php include ("bloks/footer.php"); ?>
</table>
</body>
</html>
