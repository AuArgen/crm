<?php require("./ok.php");?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $nameOffice;?> оффис</title>
    <link rel="shortcut icon" type="image/png" href="../admin/<?php echo $logo;?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8ec5b2c66c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

  <!-- start Work main -->
    <div class="workStart <?php if(substr(date("Y-m-d H:i:s"),0,10) == substr($workStart,0,10) && substr(date("Y-m-d H:i:s"),0,10) != substr($workEnd,0,10) ) echo"workStartNone"; ?>">
      <button onclick="start('workStart')">Жумушту баштоо</button>
    </div>
  <!-- end Work main -->

    <header>
      <div class="office">
        <div class="logo">
          <img src="../admin/<?php echo $logo;?>" alt="">
        </div>
        <div class="name">
          <span class="name"><?php echo $nameOffice;?></span>
          <span class="fa fa-phone phone "> <?php echo $phone;?></span>
        </div>
      </div>
      <div class="search">
          <input type="search" name="" id="search" placeholder= "Товардын аты, артикулдан издөө">
      </div>
      <div class="cartCalculator">
        <i class="fa fa-cart-shopping"></i>
        <i class="fa fa-calculator"></i>
      </div>
      <div class="developer">
        <div class="user">
          <span class="fa fa-user"> <?php echo $fioDeveloper;?> 
            
            </span>
          <span class="status fa">
            <?php echo $statusArray[$statusDeveloper];?>
          </span> 
        </div>

        <img src="../admin/<?php echo $imageDeveloper;?>" alt="">
        <ul>
          <li class="img"><img src="../admin/<?php echo $imageDeveloper;?>" alt=""></li>
          <li><span class="fa fa-user"> <?php echo $fioDeveloper;?> </span></li>
          <li onclick="start('exit')"><i class="fa fa-arrow-right-from-bracket"></i> <span>Чыгуу</span></li>
          <li onclick="start('workEnd')"><i class="fa fa-times-circle"> </i> <span>Жумушту токтотуу</span></li>
        </ul>
      </div>
    </header>
    <div class="main">
      <!-- start left main -->
      <div class="left">
        <?php
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
        ?>
        
        
      </div>
      <!-- end left main -->
      <!-- right start main-->
      <div class="right">
          <div class="trash">
            <div class="header">
              <div class="kol">Саны: <span class="kolSpan">0</span> </div>
              <div class="price">Акчасы: <span class="priceSpan">0</span>сом</div>
              <div class="client"> <input type="text" class="nameClient" placeholder="Кардардын аты"></div>
              <div class="client"> <input type="phone" class="phoneClient" placeholder="Телефон номери"></div>
              <div class="submit"> Кардарды кошуу </div>
            </div>
            <div class="trashShow">
                <div class="trashShowBlock">

                    
                </div>
            </div>
          </div>
      </div>
      <!-- end right main -->
    </div>
    <script src="../admin/js/jquery-1.9.1.min.js"></script>
    <script>
      function update() {
        let timer = setTimeout(() => {
          work()
        }, 3000);
        function work() {
          clearTimeout(timer)
          let y = "get"
          $.ajax({
                url:'./upload.php',
                type:'POST',
                cache:false,
                data:{y},
                dataType:'html',
                success: function (data) {
                  if (data.substr(0,4) != "<div") window.location.reload("./") 
                  document.querySelector(".left").innerHTML=data;
                  update()
                }
            });

        }
      }
      update()


      function start(y) {
        document.querySelector(".workStart").innerHTML = `<img src="./img/loading-loading-forever.gif" alt="zagruzka..." width="40">`
        $.ajax({
                url:'./upload.php',
                type:'POST',
                cache:false,
                data:{y},
                dataType:'html',
                success: function (data) {
                  if (data == "ok")
                  document.querySelector(".workStart").classList.toggle("workStartNone");
                  if (data == "loading") window.location.reload("./")
                }
            });
      }
      let trash = [], kolElement = 0, summaElement = 0;
      function add(x) {
        let price = "", count = 1 , name = "",artikul = "",r = 0, summa;
        for (let i = 0; i < x.length; i++) {
          if (x[i] == "$") {
            r++;
            continue;
          }
          if (r == 0) {
            artikul += x[i];
          }
          else if (r == 1) {
            price += x[i];
          } else {
            name += x[i];
          }
        }
        count = addKol(artikul);
        summa = (+price) * (+count[0]);
        let trashX = [artikul, count[0], name,price,summa];
        if (+count[0] == 1) trash.push(trashX)
        else {
          trash[+count[1]][1] = count[0];
          trash[+count[1]][4] = summa;
        }
        show()
      }

      function addKol(x) {
        for (let i = 0; i < trash.length; i++) {
          if (+trash[i][0] == +x) return [trash[i][1] + 1, i]
        }
        return [1,0];
      }
      function updateKol(x) {
        let input = +document.querySelector(`#id${x}`).value;
        input = (input <= 0? 1: input)
        x = +x
        trash[x][1] = input
        trash[x][4] = input * (+trash[x][3])
        show()
      }
      function deleteP(x) {
        x = +x;
        let d = [];
        let n = trash.length;
        for(let i = 0; i < n;i++) {
          if (i != x) {
            d.push(trash[i])
          }
        }
        trash = (n > 1?d:[]);
        show()
      }
      function show() {
        let s = `
        <table>
                    <tr>
                      <th>№</th>
                      <th>Аты</th>
                      <th>Саны</th>
                      <th>Баасы</th>
                      <th>Акчасы</th>
                      <th> <i class="fa fa-trash"></i> </th>
                    </tr>
        `;
        let n = trash.length;
        kolElement = 0;
        summaElement = 0;
        for (let i = 0; i < n; i++) {
          kolElement += +trash[i][1];
          summaElement += +trash[i][4];
          s += `
                    <tr>
                      <td>${i+1}</td>
                      <td>${trash[i][2]}</td>
                      <td class="input">
                        <input type="number" onchange="updateKol(${i})" id="id${i}" value = ${trash[i][1]} min=1>
                      </td>
                      <td>${trash[i][3]}</td>
                      <td>${trash[i][4]}</td>
                      <td class="button">
                          <button onclick="deleteP(${i})"> <i class="fa fa-trash"></i> </button>
                      </td>
                    </tr>
          `;
        }
        s += "</table>";
        if (n == 0) {
          s = ``;
          kolElement = 0;
          summaElement = 0;
        }
        document.querySelector(".trashShowBlock").innerHTML = s;
        document.querySelector(".kolSpan").innerHTML = kolElement;
        document.querySelector(".priceSpan").innerHTML = summaElement;
      }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>