<?php 

/************************************************************
*Разработали: Хомяков А.А.   Поляков А.Ю.
*Телефон:8(999)710 19 50,8(965) 065 91 98 
*данный файл выводит из бд список статей
*с помощью ссылки , методом Get передает в файл view_lessons.php переменную id
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
        <p><?php echo $myrow['text']; ?></p>
        
              <?php 
$result = mysql_query ("SELECT id,title,description,author,data,mini_img,view FROM lessons",$db);
$myrow = mysql_fetch_array ($result);
	  
do {
 printf ("<table align='center' class='post'>
            <tr >
              <td class='post_title'>
			  <p class='post_name'><img align='left' src='%s' class='mini'><a href='view_lesson.php?id=%s'>%s</a></p>
			  <p class='post_adds'>Дата добавления:%s</p>
			  <p class='post_adds'>Автор урока:%s</p> </td>
            </tr>
			
            <tr>
              <td>%s<p class='post_view'> Просмотров: %s</p></td>
            </tr>
          </table><br><br>",$myrow['mini_img'],$myrow["id"],$myrow["title"], $myrow["data"],$myrow["author"],$myrow["description"],$myrow["view"]);

		  }		  
while ($myrow = mysql_fetch_array ($result))		  
?>
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
