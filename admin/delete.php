<?php
require('./php/conn.php');
$imgs = array();
$ca = 0;
if ($_GET["news"]) {
     $id = $_GET["news"]; 
     $r = $conn -> query("select * from id where id=$id;");
     $ca = 0;
} else if ($_GET["seminar"]) {
    $id = $_GET["seminar"]; 
    $r = $conn -> query("select * from seminar where id=$id;");
    $ca = 1;
}else if ($_GET["konferensia"]) {
    $id = $_GET["konferensia"]; 
    $r = $conn -> query("select * from konferensia where id=$id;");
    $ca = 2;
}else if ($_GET["teacher"]) {
    $id = $_GET["teacher"]; 
    $r = $conn -> query("select * from we where id=$id;");
    $ca = 3;
} else {
    echo'
    <script>
    let a = location.href
    let n = a.length
    let b 
    for (let i = n-1; i > 0; i-- ) {
      if (a[i] == "/"){ b = i; break}}
    let s = ""
    for (let i = 0; i <= b; i++) s+=a[i];
    window.location.href = s;
    </script>
  ';
}
if (mysqli_num_rows($r)) {
 $row = mysqli_fetch_array($r);
 $er = 0;
 do {
    unlink($row["image"]);
    unlink($row["file"]);
     
     
 } while ($row = mysqli_fetch_array($r));
    $contentIdArrayGet = $contentIdArray[$ca];
    $conn -> query("delete from $contentIdArrayGet where id='$id'");
    header("Location:".$te[($ca)]."");
}

?>