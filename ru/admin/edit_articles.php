<?php 
/************************************************************
*�����������: ������� �.�.   ������� �.�.
*�������:8(999)710 19 50,8(965) 065 91 98 
*��������� ������ ������ �� ���� � ���� ����� � ��������� �������  GET �������� id
*� ������������ �� ��������� id ��������� ����� �� ���� ��� ����������� ��� �������������� 
*���������� ������� post � ���� update_articles.php �������� title,meta_d,meta_k,data,description,text,author � *������ �������� id
***************************************************************/ 
include ("lock.php");
include ("bloks/bd.php");
if (isset ($_GET['id'])) {$id = $_GET['id'];}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>��������� ������</title>
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

        <td valign="top" id="telo"><p>
            <?php 
		

if (!isset($id)){
$result = mysql_query("SELECT title,id FROM articles");       
$myrow = mysql_fetch_array($result);

do {
printf ("<p><a href='edit_articles.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);

}
while ($myrow = mysql_fetch_array($result));
}

else
{
$result = mysql_query("SELECT * FROM articles WHERE id=$id");       
$myrow = mysql_fetch_array($result);

print<<<HERE
<form id="form1" name="form1" method="post" action="update_articles.php">
          <p>
            <label>������� �������� ������<br />
            <input value="$myrow[title]" type="text" name="title" id="title" />
            </label>
          </p>
          <p>
            <label>������� �������� ������ <br />
            <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" />
            </label>
          </p>
          <p>
            <label>������� �������� �����<br />
            <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" />
            </label>
          </p>
          <p>
            <label>������� ���� ���������� ������ <br />
            <input value="$myrow[data]" name="data" type="text" id="data" value="2016-01-27" />
            </label>
          </p>
          <p>
            <label>������� ������� �������� ������ � ������
            <textarea  name="description" id="description" cols="40" rows="5">$myrow[description]</textarea>
</label>
          </p>
          <p>
            <label>������� ������ ����� ������ � ������
            <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
            </label>
          </p>
		  <input name="id" type="hidden" value="$myrow[id]" />
          <p>
            <label>������� ������<br />
            <input value="$myrow[author]" type="text" name="author" id="author" />
            </label>
          </p>
          <p>
            <label>
            <input type="submit" name="submit" id="submit" value="��������� ���������" />
            </label>
          </p>
        </form> 

HERE;
}

 ?>       
            
            
            
          </p></td>
      </tr>
    </table></td>
  </tr>
<!--����������� ������� ������������ �����-->  
  <?php include ("bloks/footer.php"); ?>
</table>
</body>
</html>
