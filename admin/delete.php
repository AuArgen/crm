<?php
require("./ok.php");
$imgs = array();
$ca = 0;
if (isset($_GET["buyId"])) {
  $id = $_GET["buyId"];
  $r = $conn -> query("DELETE FROM buyProducts WHERE id = '$id'");
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
}
else if (isset($_GET["ordersId"])) {
  $id = $_GET["ordersId"];
  $r = $conn -> query("DELETE FROM orders WHERE id = '$id'");
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
}else if (isset($_GET["salaryId"])){
  $id = $_GET["salaryId"];
  $r = $conn -> query("DELETE FROM salary WHERE id = '$id'");
  header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
}
else if ($_GET["developers"]) {
     $id = $_GET["developers"]; 
     $r = $conn -> query("select * from developers where id=$id and id_creater=$idCreater;");
     $ca = 0;
} else if ($_GET["product"]) {
    $id = $_GET["product"]; 
    $r = $conn -> query("select * from product where id=$id and id_creater=$idCreater;");
    $ca = 1;
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
    // header("Location:".$te[($ca)]."");
}
header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
?>