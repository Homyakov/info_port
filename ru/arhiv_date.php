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
        
        <?php
$result4 = mysql_query("SELECT DISTINCT left(data,7) AS month FROM lessons ORDER BY month",$db);

if (!$result4)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result4) > 0)

{
$myrow4 = mysql_fetch_array($result4); 
}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}
$month=$myrow4["month"];
$arr = explode("-",$month);
$arr1=$arr;
?>
 <div class="form_date" >        
<form  action="arhiv_date.php" method="get">
<label>Статьи от: </label>
	<select name="date_begine">
<?php
$date1=date("Y-m");
$date1++;
$date=$arr[0]."-".$arr[1];

do{
echo "<option>$date</option>";
if($arr[1]==12) {
	$arr[1]="01"; 
	$arr[0]++;
	$date=$arr[0]."-".$arr[1];
}
else
{	
	$date++;
	$arr = explode("-",$date);
}
}
while(!($date1==$date));
?>
	</select>
<label> и до: </label>
	<select name="date_end">
<?php 
$date=$arr1[0]."-".$arr1[1];
do{
echo "<option>$date</option>";
if($arr1[1]==12) {
	$arr1[1]="01"; 
	$arr1[0]++;
	$date=$arr1[0]."-".$arr1[1];
}
else
{	
	$date++;
	$arr1 = explode("-",$date);
}
}
while(!($date1==$date));
?>
	</select>
		<input name="sub" type="submit" value="Найти" />
</form>
  </div>    
        
              <?php		
			  if(isset($_GET["date_begine"]) and isset($_GET["date_end"]) and isset($_GET["sub"]))
			  {	  
		$date_begine	=  $_GET["date_begine"];
		$date_end	=  $_GET["date_end"];
		
	if($date_begine>$date_end) {
		$i=$date_begine; 
		$date_begine=$date_end; 
		$date_end=$i;
	}
	$date_end++;
	$date_begine=$date_begine."-01";
	$date_end=$date_end."-01";
$result = mysql_query ("SELECT id,title,description,data,author,mini_img,view FROM lessons WHERE data>='$date_begine' and data<'$date_end'",$db);
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
while ($myrow = mysql_fetch_array ($result));
}		  
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
