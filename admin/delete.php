<?php
require("./ok.php");
$imgs = array();
$ca = 0;
if ($_GET["developers"]) {
     $id = $_GET["developers"]; 
     $r = $conn -> query("select * from developers where id=$id and id_creater=$idCreater;");
     $ca = 0;
} else if ($_GET["product"]) {
    $id = $_GET["product"]; 
    $r = $conn -> query("select * from product where id=$id and id_creater=$idCreater;");
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
 } while ($row = mysqli_fetch_array($r));
    $contentIdArrayGet = $contentIdArray[$ca];
    // echo $contentIdArrayGet;
    // echo $idCreater;
    // echo $id;
    $conn -> query("delete from $contentIdArrayGet where id=$id and id_creater=$idCreater");
    header("Location:".$te[($ca)]."");
}

?>