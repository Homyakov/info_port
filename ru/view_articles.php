<?php 
/************************************************************
*Разработали: Хомяков А.А.   Поляков А.Ю.
*Телефон:8(999)710 19 50,8(965) 065 91 98 
*выводит на экран из базы данных статью в соответствии с переменной id пришедшей методом GET из файла articles.php
***************************************************************/

include ("bloks/bd.php");

if (isset ($_GET['id'])) { $id=$_GET['id'];}

$result = mysql_query("SELECT * FROM articles WHERE id='$id'",$db);
$myrow = mysql_fetch_array ($result);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta name="description" content="<?php echo $myrow['meta_d']; ?>" />
  <meta name="keywords" content="<?php echo $myrow['meta_k']; ?>" />

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><?php echo $myrow['title']; ?></title>
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
        
         <p class="view_title"><?php echo $myrow['title']; ?></p>
         <p class="view_data">Дата добавления: <?php echo $myrow['data']; ?></p>
         <p class="view_data">Автор: <?php echo $myrow['author']; ?></p>
         <p><?php echo $myrow['text']; ?></p>
        
              

            
            <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
    </table></td>
    <?php include("bloks/righttd.php"); ?>
  </tr>
<!--Подключение нижнего графического блока-->  
  <?php include ("bloks/footer.php"); ?>
</table>
</body>
</html>
