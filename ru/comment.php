<?php  include ("bloks/bd.php");

/************************************************************
*Разработали: Хомяков А.А.   Поляков А.Ю.
*Телефон:8(999)710 19 50,8(965) 065 91 98 
*в данном файле используются переменные , пришедшие методом  post : id,author,text,sub_com из файла view_lesson
*присваиваем одноименным переменным значения , переменных из глобального массива $_POST
*проводим оброботку текста в переменной text и author
*проводим защитную обработку текста с помощью функций stripslashes и htmlspecialchars
*добавляем в базу данных новый комментарий 
*отправляем на мыло сообщение о появлении нового комментария
*перезагружаем страницу
***************************************************************/

if (isset($_POST['author'])){
$author = $_POST['author'];}

if (isset($_POST['text'])){
$text = $_POST['text'];}

if (isset($_POST['pr'])){
$pr = $_POST['pr'];}

if (isset($_POST['sub_com'])){
$sub_com = $_POST['sub_com'];}

if (isset($_POST['id'])){
$id = $_POST['id'];}

if (isset($sub_com))
{

if (isset($author)) {trim($author);  }
else {$author = "";}

if (isset($text)) {trim($text);  }/*удаляем пробелы в начале и конце*/
else {$text = "";}

if (empty($author) or empty($text))/*если пустые*/
{
exit ("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля. <br> <input name='back' type='button' value='Вернуться  назад' onclick='javascript:history.go(-1);'>");
}


$author = stripslashes($author);/*удаляем слеши*/
$text = stripslashes($text);/*удаляем слеши*/

$author = htmlspecialchars($author);
$text = htmlspecialchars($text);/*нейтрализуем теги*/

$result = mysql_query ("SELECT sum FROM comments_settings ",$db);
$myrow = mysql_fetch_array($result);

if ($pr == $myrow["sum"])
{
$date = date("Y-m-d");
$result2 = mysql_query ("INSERT INTO comments (post,author,text,date) VALUES ('$id','$author','$text','$date')",$db);

$address = "lexys10@mail.ru";
$subject = "Новый коммент";
$result3 = mysql_query ("SELECT title FROM data WHERE id='$id'",$db);
$myrow3 = mysql_fetch_array ($result3);
$post_title = $myrow3["title"];

$message = "Появился комментарий к заметке - ".$post_title."\n Комментарий добавил(а): ".$author."\n Текст комментария: ".$text."\n Ссылка на заметку : http://localhost/phpblog/view_post.php?id=".$id."";

mail($address,$subject,$message,"Content-type:text/plain; Charset = windows-1251\r\n");

echo "<html><head>

<meta http-equiv='Refresh' content='0; URL=view_lesson.php?id=$id'>

</head></html>";
exit ();
}
else
{
exit ("<p>Вы ввели не првильную сумму с картинки <br> <input name='back' type='button' value='Вернуться  назад' onclick='javascript:history.go(-1);'>");
}



}




?>