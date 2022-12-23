<?php
	$conn = new mysqli("localhost", "username","Argen1:)","php");
	if ($conn -> connect_errno) {
		die("Error !!! ".$conn -> connect_errno);
        $conn -> close();
}
$te = ["news.php","seminar.php","konferensia.php","we.php"];
$contentIdArray = ["id","seminar","konferensia","we"];
$names = ["Новости","Семинар","Конференция"];
$dataName = ["id","seminar","konferensia"];
$linkName = ["news","seminar","konferensia"];
?>
