<?php 
/************************************************************
*�����������: ������� �.�.   ������� �.�.
*�������:8(999)710 19 50,8(965) 065 91 98 
*������� �� ����� �� ���� ������ ������ � ������������ � ���������� id ��������� ������� GET �� ����� lessons.php
*����������� ���-�� ����������
*������� ����������� �� ���� ������ � ������������ � ���������� id
*���������� ������� post � ���� comment.php ��������� id,author,text,sub_com
***************************************************************/

include ("bloks/bd.php");

if (isset($_GET['id'])) { $id=$_GET['id'];}
if (!isset($id)) {$id = 1;}


$result = mysql_query("SELECT title,meta_d,meta_k,data,text,author,view FROM lessons WHERE id='$id'",$db);
$myrow = mysql_fetch_array ($result);

if (!$result)
{
echo "<p>������ �� ������� ������ �� ������ . �������� �� ���� ��������������<br><strong>��� ������:</strong> </p>";
exit (mysql_error());
}

 if (mysql_num_rows($result) > 0)
{

$new_view = $myrow["view"]+1;
$update = mysql_query ("UPDATE lessons SET view='$new_view' WHERE id='$id'",$db);
}

else 
{
echo "<p>���������� �� ������� �� ����� ���� ��������� , ������� �����.</p>";
exit ();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta name="description" content="<?php echo $myrow['meta_d']; ?>" />
  <meta name="keywords" content="<?php echo $myrow['meta_k']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><?php echo $myrow["title"]; ?></title>
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
        <td valign="top" id="telo" >
 
      
<p class="post_title2"><?php echo $myrow['title']; ?></p>
         <p class="post_add">���� ����������: <?php echo $myrow['data']; ?></p>
         <p class="post_add">�����: <?php echo $myrow['author']; ?></p>
         <p><?php echo $myrow['text']; ?></p>	
         <p>����������: <?php echo $myrow['view'] ?></p>
		 
		 
<?php 

	 
echo "<p class='post_comment'>�����������:</p>";	
$result3 = mysql_query ("SELECT * FROM comments WHERE post='$id'",$db);	 
 if (mysql_num_rows($result3) > 0)
 {
 $myrow3 = mysql_fetch_array ($result3);
 
 do 
 {
 printf ("<div class='post_div'><p class='post_comment_add'>����������� �������(�): <strong>%s</strong> <br> ����: <strong>%s</strong></p>
 <p>%s</p></div>",$myrow3["author"],$myrow3["date"],$myrow3["text"]);
 }
 while ( $myrow3 = mysql_fetch_array ($result3));
 }	
 	 
$result4 = mysql_query ("SELECT img FROM comments_settings",$db);
$myrow4 = mysql_fetch_array ($result4);		 	
        ?>    
        <p class='post_comment'>�������� ��� �����������:  </p>
        <form action="comment.php" method="post" name="form_com">
        <p><label>���� ���: </label><input name="author" type="text" size="25" maxlength="25" /></p>
        
<p><label>����� �����������: <br> <textarea name="text" cols="36" rows="4"></textarea></label> </p><p>������� ����� ����� � ��������: </p>
 <p><img style="margin-top: 3px;" src="<?php echo $myrow4["img"]?>" width="80" height="40">
 

 <input style="vertical-align: top;margin-top: 10px;" name="pr" type="text" size="5" maxlength="5"> </p>
 <input name="id" type="hidden" value="<?php echo $id;?>" />
<p><input name="sub_com" type="submit" value="��������������" /></p>

        
        </form>
        
   
        
        </td>
      </tr>
    </table></td>
        <?php include("bloks/righttd.php"); ?>
  </tr>
  <?php  include ("bloks/footer.php");?>
</table>
</body>
</html>