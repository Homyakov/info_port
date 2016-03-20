<?php
/************************************************************
*Разработали: Хомяков А.А.   Поляков А.Ю.
*Телефон:8(999)710 19 50,8(965) 065 91 98 
*Приходит переменная методом POST из файла del_lesson.php
*Присваиваем значение из массива $_POST одноименной переменной  
*Производим удаление в соответствии со значением переменной  id
***************************************************************/
include ("lock.php");
include ("bloks/bd.php");
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
if (isset($id))
{

$result = mysql_query ("DELETE FROM lessons WHERE id='$id'");

if ($result == 'true') { echo "<p>Ваш урок успешно удален!</p>";}
else {echo "<p>Ваш урок не удален</p>";}
	} 
else 
{
echo "<p>Не найден параметр</p>";
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
