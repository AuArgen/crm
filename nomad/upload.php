<?php
    require("./ok.php");
    $y = ""; 
    $x = "";
    $trash = "";
    if (isset($_POST["tovarNameFor"])) {
      $tovarNameFor = $_POST["tovarNameFor"];
      $tovarIdFor = $_POST["tovarIdFor"];
      $tovarCountFor = $_POST["tovarCountFor"];
      $tovarPriceFor = $_POST["tovarPriceFor"];
      $tovarPriceAllFor = $_POST["tovarPriceAllFor"];
      $r = $conn->query("INSERT INTO buyProducts(name_product, price_product, count_product, date_product,	all_price_product) VALUES('$tovarNameFor','$tovarPriceFor','$tovarCountFor',now(), '$tovarPriceAllFor')");
      $t = 0;
      if ($r) {
          $r = $conn->query("SELECT * FROM product");
          if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
              $t = $row["count"]+0+$tovarCountFor;
              
            } while ($row = mysqli_fetch_array($r));
          }
          $e = $conn->query("UPDATE product SET count=$t WHERE id=$tovarIdFor");
      }
    }
    if (isset($_POST["getBuyProduct"])) {
      $r = $conn->query("SELECT * FROM product WHERE id_creater = $idCreater");
      if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array($r); 
        do {
          echo $row["id"].','.$row["name"].'@';
        } while ($row = mysqli_fetch_array($r));
      }
    }
    if (isset($_POST["idReport"])) {
      $idReport = $_POST["idReport"];
      $r = $conn->query("SELECT * FROM orders WHERE id='$idReport'");
      // echo $idReport;
      if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array($r);
        do {
          echo ''.$row["name_order"].''.$row["client_order"].','.$row["client_phone_order"].','.$idReport;
        } while ($row = mysqli_fetch_array($r));
      }
    }
    if (isset($_POST["dx"])) {
        $dx = $_POST["dx"];
        $r = $conn->query("DELETE FROM orders WHERE id = $dx");
    }
    if (isset($_POST["idReportSave"])) {
        $idReportSave = $_POST["idReportSave"];
        $addReportTrash = $_POST["addReportTrash"];
        if ($conn -> query("UPDATE orders SET accepted = '1', name_order = '$addReportTrash' WHERE id = '$idReportSave' and id_developers = $idDevoloper")) {
          $r = $conn -> query("SELECT * FROM orders WHERE id_developers = $idDevoloper and accepted='0'");
          echo mysqli_num_rows($r);
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
                      <p class=""><span>Даанасы:</span> <span>'.$row["count"].'</span> </p>
                    </div>';
            } while ($row = mysqli_fetch_array($r));
          }
    }
    if (isset($_POST["search"])){
      $search = $_POST["search"];
      $r = $conn -> query("SELECT * FROM product WHERE id_creater='$idCreater' and artikul like '%$search%'  ORDER BY id DESC");
          if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
              echo '<div class="block" onclick="add(`'.$row["artikul"].'$'.$row["price"].'$'.$row["name"].'`)">
                      <img src="../admin/'.$row["image"].'" alt="">
                      <p class="name"><span>Аты: </span> <span>'.$row["name"].'</span></p>
                      <p class="price"><span>Баасы: </span><span>'.$row["price"].' сом</span></p>
                      <p class="artikul"><span>Артикулу:</span> <span>'.$row["artikul"].'</span> </p>
                      <p class=""><span>Даанасы:</span> <span>'.$row["count"].'</span> </p>
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
                        <button onclick="addReport('.$row["id"].')" class="btncheck"> <i class="fa fa-check"></i> </button>
                        </textarea>
                    </td>
                  </tr>
                  
                  ';
                } while ($row = mysqli_fetch_array($r));
                echo "</table>";
              }
    }
?>