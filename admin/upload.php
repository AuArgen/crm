<?php
require("./php/conn.php");
//upload.php
if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
//  chmod('ok', 0777);
 $allowed_extension = array("jpg", "gif", "png","jpeg","pdf","doc","txt","doxc","docx","pptx");
 $allowed_extension2 = array("pdf","doc","txt","doxc","docx","pptx");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, './img/' . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  if (in_array($extension, $allowed_extension2))$url = 'admnika8/img/' . $new_image_name;
  else $url = 'img/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
// echo "<script type='text/javascript'>alert($function_number, '$url', '');</script>";

 }
}

if (isset($_POST["saveContent"])) {
  $theme = $_POST["theme__content"];
  $small = $_POST["small__content"];
  $full = $_POST["full__content"];
  $date = $_POST["date"];
  $contentId = $_POST["contentId"];
  $iamge = images();
  $contentIdArrayGet = $contentIdArray[$contentId];
  if($iamge != "")
  $r= $conn->query("INSERT INTO  $contentIdArrayGet (theme, small__content, full__content, image, date__content, show__content, post_content,adding) VALUES('$theme','$small', '$full', '$iamge', '$date', '0','0','')");

  echo'
  <script>
  let a = location.href
  let n = a.length
  let b 
  for (let i = n-1; i > 0; i-- ) {
    if (a[i] == "/"){ b = i; break}}
  let s = ""
  for (let i = 0; i <= b; i++) s+=a[i];
  s +="'.$te[$contentId].'"
  window.location.href = s;
  </script>
';


}
if (isset($_POST["saveUpdate"])) {
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
}
if (mysqli_num_rows($r)) {
  $row = mysqli_fetch_array($r);
  $er = 0;
  do {
      if ($_FILES["imges"]["name"] != "")
      unlink($row["image"]);
      $t = $row["full__content"];
      $n = strlen($t);
      for ($i = 0; $i < $n; $i++) {
          if ($i + 1 < $n && substr($t, $i,4) == "<img" ) {
              $rt = 0;
              for ($j = $i; $j < $n ; $j++) {
                  if (substr($t, $j, 4) == "src=") {
                      $j += 5;
                      $img = '';
                      for ($k = $j; $k < $n; $k++) {
                          if ($rt == 0) {
                              if (substr($t, $k, 2) == "/>") break;
                              if (substr($t,$k,4) == ".png" || substr($t,$k,4) == ".jpg" || substr($t,$k,5) == ".jpeg") {
                                  $j = $k + 4;
                                  if (substr($t,$k,4) == ".png") {
                                      $w = $w.'.png';
                                      $img = $img.'.png';

                                  }
                                  if (substr($t,$k,4) == ".jpg") {
                                      $w = $w.'.jpg';
                                      $img = $img.'.jpg';

                                  }
                                  if (substr($t,$k,5) == ".jpeg") {
                                      $w = $w.'.jpeg';
                                      $img = $img.'.jpeg';
                                      $j = $j + 1;

                                  }
                                  break;
                              } else {
                                  $img = $img.''.$t[$k];
                              }
                              $j = $k;
                          }
                      }
                      $imgs[] = $img;
                  } else echo $t[$j];
                  $i = $j;
                  if ($t[$j] == '>') break;
                  
              }
          }
      }
      
  } while ($row = mysqli_fetch_array($r));
      $theme = $_POST["theme__content"];
      $small = $_POST["small__content"];
      $full = $_POST["full__content"];
      $date = $_POST["date"];
      $tabels = ["id"];
      $contentIdArrayGet = $contentIdArray[$ca];
      // $conn -> query("delete from ".$contentIdArrayGet."  where id='$id'");
      $imgn = count($imgs);
      if ($imgn) {
              for($i = 0; $i < $imgn; $i++) {
                if (substr_count($full, $imgs[$i]) == 0)
                  unlink('./'.$imgs[$i]);
              }
      }

      $iamge = images();

      if($iamge != "")
       if ( $conn->query("UPDATE ".$contentIdArrayGet." SET full__content='$full', small__content='$small', theme='$theme', date__content='$date', image='$iamge' where id='$id'")) {
       
        echo'
          <script>
          let a = location.href
          let n = a.length
          let b 
          for (let i = n-1; i > 0; i-- ) {
            if (a[i] == "/"){ b = i; break}}
          let s = ""
          for (let i = 0; i <= b; i++) s+=a[i];
          s +="'.$te[$ca].'"
          window.location.href = s;
          </script>
        ';
       }
  }
}



if (isset($_POST["saveContact"])) {
  $time1 = $_POST["time1"];
  $time2 = $_POST["time2"];
  $telephon = $_POST["telephon"];
  $email = $_POST["email"];
  $location = $_POST["location"];
  $r = $conn->query("UPDATE contact SET `start`='$time1' , `end`='$time2' , phone='$telephon' , email='$email' , `location`='$location'");
  echo'
  <script>
  let a = location.href
  let n = a.length
  let b 
  for (let i = n-1; i > 0; i-- ) {
    if (a[i] == "/"){ b = i; break}}
  let s = ""
  for (let i = 0; i <= b; i++) s+=a[i];
  s +="contact.php"
  window.location.href = s;
  </script>
';
}

if (isset($_POST["saveTeacher"])) {
  $fio = $_POST["fio"];
  $lesson = $_POST["lesson"];
  $instagram = $_POST["instagram"];
  $whatsapp = $_POST["whatsapp"];
  $facebook = $_POST["facebook"];
  $image = images();
  $file = files();
  $r = $conn->query("insert into we(fio,lesson,image,file,instagram,whatsapp,facebook) values('$fio','$lesson','$image','$file','$instagram','$whatsapp','$facebook')");
  echo'
  <script>
  let a = location.href
  let n = a.length
  let b 
  for (let i = n-1; i > 0; i-- ) {
    if (a[i] == "/"){ b = i; break}}
  let s = ""
  for (let i = 0; i <= b; i++) s+=a[i];
  s +="we.php"
  window.location.href = s;
  </script>
';
}

if (isset($_POST["updateTeacher"])) {
  $fio = $_POST["fio"];
  $lesson = $_POST["lesson"];
  $instagram = $_POST["instagram"];
  $whatsapp = $_POST["whatsapp"];
  $facebook = $_POST["facebook"];
  $image = images();
  $file = files();
  $r = $conn->query("UPDATE we SET fio='$fio',lesson='$lesson', instagram='$instagram', facebook='$facebook', whatsapp='$whatsapp', image='$image', file='$file' WHERE id='$id'");
  echo'
  <script>
  let a = location.href
  let n = a.length
  let b 
  for (let i = n-1; i > 0; i-- ) {
    if (a[i] == "/"){ b = i; break}}
  let s = ""
  for (let i = 0; i <= b; i++) s+=a[i];
  s +="we.php"
  window.location.href = s;
  </script>
';
}


function images() {
  if ($_FILES["images"]["name"] != '') {
    $imgh = $_POST["dontUpImg"];
    unlink($imgh);
      $test = explode(".",$_FILES["images"]["name"]);
      $e = end($test);
      $name = "IMG-".date("Y-m-d-H-i-s").''.rand(1,10000).'k.'.$e;
      $l = './img/'.$name;
 chmod('img', 0777);

      if (move_uploaded_file($_FILES["images"]["tmp_name"],$l))
      {
          $l = 'img/'.$name;
          return $l;
      }
  }  else return $_POST["dontUpImg"];
}

function files(){
  if ($_FILES['uploaded']['tmp_name'] != '') {
    $imgh = $_POST["dontUpFile"];
    unlink($imgh);
$file = $_FILES['uploaded']['tmp_name'];
 $file_name = $_FILES['uploaded']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
//  chmod('ok', 0777);
 $allowed_extension = array("jpg", "gif", "png","jpeg","pdf","doc","txt","doxc","docx","pptx");
 $allowed_extension2 = array("pdf","doc","txt","doxc","docx","pptx");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, './img/' . $new_image_name);
  $url = 'img/' . $new_image_name;
  $message = '';
  return $url;
// echo "<script type='text/javascript'>alert($function_number, '$url', '');</script>";

 }
}else return $_POST["dontUpFile"];
}


?>
