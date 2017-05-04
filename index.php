<?php 
include 'init.php';

if(isset($_POST['name'],$_POST['comment'])){

$name = mysql_real_escape_string($_POST['name']);
$comment = mysql_real_escape_string($_POST['comment']);

$result = $db->query("INSERT INTO `review`(`id`, `name`, `comment`) VALUES ('','$name','$comment')");
header("Location:index.php");
}

$info = [];

$show = $db ->query("SELECT * FROM `review` ORDER BY id DESC");

while ($row = $show->fetch_object()) {
	$info[] = $row;
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>reviews</title>
 </head>
 <body>
 
 <div>
 	<form action="" method="post">
 		<div><input type="text" name="name" placeholder="name"></div>
 		<div><textarea type="text" name="comment" placeholder="comment"></textarea></div>
 		<div><input type="submit" name="comment" value="reviews"> </div>
 	</form>
 </div>

<br>

 <div>
<?php foreach ($info as $val): ?>
<div>Name: <?php  echo $val->name; ?></div>
<div>Comment: <?php  echo $val->comment; ?></div> 	

 </div>
 <?php endforeach; ?>
 </body>
 </html>