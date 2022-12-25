<?php
	$conn = new mysqli("localhost", "username","Argen1:)","crm");
	if ($conn -> connect_errno) {
		die("Error !!! ".$conn -> connect_errno);
        $conn -> close();
}
$te = ["we.php","towar.php","konferensia.php","we.php"];
$contentIdArray = ["developers","product","konferensia","we"];
$names = ["Новости","Семинар","Конференция"];
$dataName = ["id","seminar","konferensia"];
$linkName = ["news","seminar","konferensia"];
$statusArray = ["cashier"=>"Кассир","graph"=>"График дизайнер","graphAndAdmin"=>"График дизайнер и админ"];
?>
