<?php
    require("./ok.php");
    $y = $_POST["y"];
    if ($y == "workStart") {
        if ($conn -> query("UPDATE developers SET start_working = now() WHERE id = '$idDevoloper'")) echo'ok';
        else echo"no!!";
    } 
    if ($y == "workEnd") {
        if ($conn -> query("UPDATE developers SET end_working = now() WHERE id = '$idDevoloper'")) {
            echo'loading';
        }
        else echo"no!!";
    }
    if ($y == "exit") {
        $_SESSION["loginDevoloper"]="";
        $_SESSION["passDevoloper"]="";
        echo "loading";
    }
    if ($y == "get") {
        $r = $conn -> query("SELECT * FROM product WHERE id_creater='$idCreater' ORDER BY id DESC");
          if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
              echo '<div class="block" onclick="add(`'.$row["artikul"].'$'.$row["price"].'$'.$row["name"].'`)">
                      <img src="../admin/'.$row["image"].'" alt="">
                      <p class="name"><span>Аты: </span> <span>'.$row["name"].'</span></p>
                      <p class="price"><span>Баасы: </span><span>'.$row["price"].' сом</span></p>
                      <p class="artikul"><span>Артикулу:</span> <span>'.$row["artikul"].'</span> </p>
                      <p><span>Даанасы:</span><span>'.$row["count"].'</span></p>
                    </div>';
            } while ($row = mysqli_fetch_array($r));
          }
    }
?>