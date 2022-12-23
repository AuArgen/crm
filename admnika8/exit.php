<?php
    require("./ok.php");
    if ($_GET["news"]) {
        $id = $_GET["news"];
        $r = $conn->query("UPDATE id SET adding='' WHERE id='$id'");
    }
    if ($_GET["konferensia"]) {
        $id = $_GET["konferensia"];
        $r = $conn->query("UPDATE konferensia SET adding='' WHERE id='$id'");
    }
    if ($_GET["seminar"]) {
        $id = $_GET["seminar"];
        $r = $conn->query("UPDATE seminar SET adding='' WHERE id='$id'");
    }
    header("Location:./index.php");
?>