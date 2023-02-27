<?php
    require("./ok.php");
    $y = ""; 
    $x = "";
    $trash = "";
    if (isset($_POST["historyDev"])) {
      // echo $idDevoloper;
      $r = $conn -> query("SELECT * FROM orders WHERE id_developers=$idDevoloper and accepted=1 and get_developer='-' order by id desc ");
      // echo mysqli_num_rows($r);
      if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array($r);
        do {
          echo $row["client_order"].'-$-'.$row["name_order"].'-$-'.$row['date_order'].'-$-'.$row["price_order"].'-$-'.$row["count_order"].'-$-'.$row["client_phone_order"].'-$-'.$row["price_order_give"].'+%+';
        } while ($row = mysqli_fetch_array($r));
      }
    }
    if (isset($_POST["finishedTovarX"])) {
      $finishedTovarX = $_POST["finishedTovarX"];
      $r = $conn->query("UPDATE orders SET accepted='2' WHERE id='$finishedTovarX'");
    }
    if (isset($_POST["userDataKolX"])) {
      $userDataKolX = $_POST["userDataKolX"];
      // $userDataKolN = $_POST["userDataKolN"];
      $userDataArtiulX = $_POST["userDataArtiulX"];
      $t=0;
      $r = $conn->query("SELECT * FROM product where artikul='$userDataArtiulX' and id_creater=$idCreater");
          if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
              $t = $row["count"]+0-$userDataKolX;
              
            } while ($row = mysqli_fetch_array($r));
          }
          $e = $conn->query("UPDATE product SET count=$t where artikul='$userDataArtiulX' and id_creater=$idCreater");
    }
    if (isset($_POST["tovarNameFor"])) {
      $tovarNameFor = $_POST["tovarNameFor"];
      $tovarIdFor = $_POST["tovarIdFor"];
      $tovarCountFor = $_POST["tovarCountFor"];
      $tovarPriceFor = $_POST["tovarPriceFor"];
      $tovarPriceAllFor = $_POST["tovarPriceAllFor"];
      $r = $conn->query("INSERT INTO buyProducts(name_product, price_product, count_product, date_product,	all_price_product) VALUES('$tovarNameFor','$tovarPriceFor','$tovarCountFor',now(), '$tovarPriceAllFor')");
      $t = 0;
      if ($r) {
          $r2 = $conn->query("SELECT * FROM product where id='$tovarIdFor' and id_creater='$idCreater'");
          if (mysqli_num_rows($r2)) {
            $row = mysqli_fetch_array($r2);
            do {
              $t = $row["count"]+$tovarCountFor;
              $e = $conn->query("UPDATE product SET count=$t WHERE id=$tovarIdFor");
            } while ($row = mysqli_fetch_array($r2));
          }
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
        $userDataName = $_POST["userDataName"];
        $userDataPhone = $_POST["userDataPhone"];
        $userDataKol = $_POST["userDataKol"];
        $userDataSumma = $_POST["userDataSumma"];
        if ($conn -> query("UPDATE orders SET client_phone_order='$userDataPhone', client_order='$userDataName' , price_order='$userDataSumma', count_order='$userDataKol', accepted = '1', name_order = '$addReportTrash' WHERE id = '$idReportSave' and id_developers = $idDevoloper")) {
          $r = $conn -> query("SELECT * FROM orders WHERE id_developers = $idDevoloper and accepted='0'");
          echo mysqli_num_rows($r);
        }
    }
    if (isset($_POST["y"])) $y = $_POST["y"];
    if ($y == "getCashier") {
      echo '
      <div class="cashier">
      <table>
        <tr>
          <th>№</th>
          <th>Клиент</th>
          <th>Телефон</th>
          <th>Заказы</th>
          <th>Акчасы</th>
          <th>Заказ күнү</th>
          
        </tr>
      ';
      $r = $conn -> query("SELECT * FROM orders WHERE  accepted='1'");
      if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array($r);
        $count = 1;
        $accepted = [];
        do {
          $accepted[]=[''];
        echo '<tr onclick="finishedTovar('.$row["id"].')">
                <td>'.$count++.'</td>
                <td>'.$row["client_order"].'</td>
                <td>'.$row["client_phone_order"].'</td>
                <td>'.$row["name_order"].'</td>
                <td>'.$row["price_order"].'</td>
                <td>'.$row["date_order"].'</td>
              </tr>';
        } while ($row = mysqli_fetch_array($r));
      }
      echo"          </table>
      </div>";
    }
    if (isset($_POST["x"])) {
        $x = $_POST["x"];
        if ($x == "0")  {
            $trash = $_POST["trashx"];
            $name = $_POST["getNameClient"];
            $phone = $_POST["getPhoneClient"];
            $kol = $_POST["kolElement"];
            $summa = $_POST["summaElement"];
            // echo $trash;
            if($conn -> query("INSERT INTO orders(id_creater,	id_developers, name_order,	count_order, date_order, accepted,	client_order,	price_order,	price_order_give,	rejected,	client_phone_order,get_developer) values($idCreater,$idDevoloper,'$trash','$kol',now(),'$x','$name','$summa','$summa',0,'$phone','-')")) {
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
          $_SESSION["loginDevoloper"]="/*/*";
          $_SESSION["passDevoloper"]="/*/*/*";  
          echo'loading';
        }
        else echo"no!!";
    }
    if ($y == "exit") {
        $_SESSION["loginDevoloper"]="/*/*";
        $_SESSION["passDevoloper"]="/*/*/*";
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