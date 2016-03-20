<?php 
/************************************************************
*Разработали: Хомяков А.А.   Поляков А.Ю.
*Телефон:8(999)710 19 50,8(965) 065 91 98 
*Приходят значения title,meta_d,meta_k,data,description,text,author, id методом  post из файла  edit_lesson.php
*Присвоение этих значений из массива $_POST одноименным переменным  
*Изменение в базе в таблице lessons уроков
***************************************************************/
include ("lock.php");
include ("bloks/bd.php");
if (isset($_POST['title']))      { $title=$_POST['title']; if ($title == '') {unset($title);} }
if (isset($_POST['meta_d']))     {$meta_d=$_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))     {$meta_k=$_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['data']))       {$data=$_POST['data'];   if ($data== '') {unset($data);}}
if (isset($_POST['description'])){$descriptio=$_POST['description'];if ($description== '') {unset($description);}}
if (isset($_POST['text']))       {$text=$_POST['text'];   if ($text== '') {unset($text);}}
if (isset($_POST['author']))     {$author=$_POST['author']; if ($author== '') {unset($author);}}
if (isset($_POST['id']))     {$id=$_POST['id']; }

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>обработчик</title>
<link href="style.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

<table width="690" border="0" align="center" class="main_border" cellpadding="0" cellspacing="0">
<!--Подключение шапки -->
<?php include("bloks/header.php"); ?>
  <tr>
    <td><table width="690" border="0" cellpadding="0" cellspacing="0">
  <tr>
<!--Подключение левого блока-->  
<?php include("bloks/lefttd.php"); ?>
        <td valign="top" id="telo">
                
                 <p>
                   <?php 
if (isset($title) && isset($meta_d)	&& isset($meta_k)&& isset($data)&& isset($description)&& isset($text)&& isset($author) )
{
/*можно заносить в базу*/
$result = mysql_query ("UPDATE lessons SET title='$title',meta_d='$meta_d',meta_k='$meta_k',data='$data',description='$description',text='$text',author='author' WHERE id='$id'");

if ($result == 'true') { echo "<p>Ваш урок успешно обновлен!</p>";}
else {echo "<p>Ваш урок не обновлен</p>";}
	} 
else 
{
echo "<p>Не все поля заполнены,урок в базу не может быть обновлен</p>";
}				 
				 

				 ?>
                 </p>
            <p>&nbsp; </p></td>
      </tr>
    </table></td>
  </tr>
<!--Подключение нижнего графического блока-->  
  <?php include ("bloks/footer.php"); ?>
</table>
</body>
</html>
