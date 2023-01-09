<?php
    require("./ok.php");
    $y = ""; 
    $x = "";
    $trash = "";
    if (isset($_POST["dx"])) {
        $dx = $_POST["dx"];
        $r = $conn->query("DELETE FROM orders WHERE id = $dx");
    }
    if (isset($_POST["addC"])) {
        $addC = $_POST["addC"];
        if ($conn -> query("UPDATE orders SET accepted = '1' WHERE id = '$addC' and id_developers = $idDevoloper")) {
            echo "ok";
        }
    }
    if (isset($_POST["y"])) $y = $_POST["y"];
    if (isset($_POST["x"])) {
        $x = $_POST["x"];
        if ($x == "0")  {
            $trash = $_POST["trashx"];
            $name = $_POST["getNameClient"];
            $phone = $_POST["getPhoneClient"];
            $kol = $_POST["kolElement"];
            $summa = $_POST["summaElement"];
            // echo $trash;
            if($conn -> query("INSERT INTO orders(id_creater,	id_developers, name_order,	count_order, date_order, accepted,	client_order,	price_order,	price_order_give,	rejected,	client_phone_order) values($idCreater,$idDevoloper,'$trash','$kol',now(),'$x','$name','$summa','$summa',0,'$phone')")) {
                $r = $conn -> query("SELECT * FROM orders WHERE id_developers = $idDevoloper and accepted='0'");
                echo mysqli_num_rows($r);
            }
            else echo"loading";
        }
    }

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
    if ($y == "showCart") {
        $r = $conn -> query("SELECT * FROM orders WHERE id_developers=$idDevoloper and accepted='0'");
              // $kolOrders = mysqli_num_rows($r);
              if (mysqli_num_rows($r)) {
                echo '<table>
                <tr>
                  <th>№</th>
                  <th>Аты</th>
                  <th>Саны</th>
                  <th>Убактысы</th>
                  <th>Акчасы</th>
                  <th> <i class="fa fa-trash"></i> </th>
                  <th> <i class="fa fa-check"></i> </th>
                </tr>';
                $row = mysqli_fetch_array($r);
                $count = 1;
                do {
                  echo '
                  <tr>
                    <td>'.$count++.'</td>
                    <td>'.$row["client_order"].'</td>
                    <td class="input">
                      '.$row["count_order"].'
                    </td>
                    <td>'.$row["date_order"].'</td>
                    <td>'.$row["price_order"].'</td>
                    <td class="button">
                        <button onclick="deleteC('.$row["id"].')"> <i class="fa fa-trash"></i> </button>
                    </td>
                    <td class="button">
                        <button onclick="addC('.$row["id"].')" class="btncheck"> <i class="fa fa-check"></i> </button>
                        <textarea value="'.$row["id"].'!'.$row["name_order"].'!'.$row["count_order"].'!'.$row["price_order"].'!'.$row["client_phone_order"].'!'.$row["client_order"].'!" class="textarea">
                        </textarea>
                    </td>
                  </tr>
                  
                  ';
                } while ($row = mysqli_fetch_array($r));
                echo "</table>";
              }
    }
?>