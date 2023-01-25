<?php require("./ok.php");?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $nameOffice;?> оффис</title>
    <link rel="shortcut icon" class="rels" type="image/png" href="../admin/<?php echo $logo;?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8ec5b2c66c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
  <div class="buyProduct"></div>
  <div class="addReport"></div>

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
      <div class="search" style="display:<?php if ($statusDeveloper == "cashier") echo "none";?>">
          <input type="search" name="" id="search" oninput="search()" placeholder= "Товардын аты, артикулдан издөө">
      </div>
      <div class="cartCalculator" style="display:<?php if ($statusDeveloper == "cashier") echo "none";?>">
        <i class="fa fa-cart-shopping" onclick="cart()">
          <?php if ($kolOrders>0) echo '<span>'.$kolOrders.'</span>';?><!-- <span>100</span> -->
        </i>
        <i class="fa fa-calculator" onclick="buyProductGet()" <?php if ($statusDeveloper != "graphAndAdmin") echo'style="display:none;"';?>></i>
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
          if ($statusDeveloper == "cashier") {
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
                <th><i class="fa fa-check"></i></th>
              </tr>
            ';
            $r = $conn -> query("SELECT * FROM orders WHERE  accepted='1'");
            if (mysqli_num_rows($r)) {
              $row = mysqli_fetch_array($r);
              $count = 1;
              $accepted = [];
              do {
                $accepted[]=[''];
              echo '<tr>
                    <td>'.$count++.'</td>
                    <td>'.$row["client_order"].'</td>
                    <td>'.$row["client_phone_order"].'</td>
                    <td>'.$row["name_order"].'</td>
                    <td>'.$row["price_order"].'</td>
                    <td>'.$row["date_order"].'</td>
                    <td><button><i class="fa fa-check"></i></button></td>
                  </tr>';
              } while ($row = mysqli_fetch_array($r));
            }
            echo"          </table>
            </div>";
          }
          else {
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
        ?>
        
        
      </div>
      <!-- end left main -->
      <!-- right start main-->
      <div class="right">
          <div class="trash ">
            <div class="header">
              <div class="kol">Саны: <span class="kolSpan">0</span> </div>
              <div class="price">Акчасы: <span class="priceSpan">0</span>сом</div>
              <div class="client"> <input type="text" class="nameClient" placeholder="Кардардын аты"></div>
              <div class="client"> <input type="tel" class="phoneClient" placeholder="Телефон номери"></div>
              <div class="submit" onclick="addClient('0')"> Кардарды кошуу </div>
            </div>
            <div class="trashShow">
                <div class="trashShowBlock">

                    
                </div>
            </div>
          </div>
          <div class="cart">
            <?php
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
            ?>
          </div>
      </div>
      <!-- end right main -->
    </div>
    <script src="../admin/js/jquery-1.9.1.min.js"></script>
    <script>
      function update() {
        let getDate = "<?php echo substr(date("Y-m-d H:i:s"),8,2)?>";
        let jsDate = new Date().getDate();
        // console.log(+getDate, +jsDate)
        if (+getDate != +jsDate) window.location.reload()
        let timer = setTimeout(() => {
          work()
        }, 3000);
        function work() {
          clearTimeout(timer)
          let y = "get"
          if (document.querySelector("#search").value=="" ) {
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
          } else {
            update();
          }

        }
      }
      let statusDeveloper = "<?php echo $statusDeveloper;?>";
      if (statusDeveloper != "cashier")
      update()
      function search() {
        let search = document.querySelector("#search").value
        // if (search == "") update();
        $.ajax({
                url:'./upload.php',
                type:'POST',
                cache:false,
                data:{search},
                dataType:'html',
                success: function (data) {
                  if (data.substr(0,4) != "<div") update(); 
                  document.querySelector(".left").innerHTML=data;
                }
            });       
      }

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
        if (document.querySelector(".cartActive")) {
          document.querySelector(".trash").classList.toggle("trashNone");
          document.querySelector(".cart").classList.toggle("cartActive")
        }
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
        // summa = (+price) * (+count[0]);
        let trashX = [artikul, count[0], name,price,0];
        if (+count[0] == 1) trash.push(trashX)
        else {
          trash[+count[1]][1] = count[0];
          // trash[+count[1]][4] = 0;
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
      function deleteC(dx) {
        document.querySelector(".cart").innerHTML = `<img src="./img/loading-loading-forever.gif" alt="zagruzka..." width="40">`
        $.ajax({
                  url:'./upload.php',
                  type:'POST',
                  cache:false,
                  data:{dx},
                  dataType:'html',
                  success: function (data) {
              // alert(data)
                    // if (data == "ok") {
                      window.location.reload("./");
                    // }
                    // document.querySelector(".workStart").classList.toggle("workStartNone");
                  }
              });

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
                      <td>${+trash[i][3]* +trash[i][1]}</td>
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
      function cartShow() {
        let y = "showCart";
        $.ajax({
                url:'./upload.php',
                type:'POST',
                cache:false,
                data:{y},
                dataType:'html',
                success: function (data) {
                  // if (data.substr(0,4) != "<dz") window.location.reload("./") 
                  document.querySelector(".cart").innerHTML=data;
                  // update()
                }
            });
      }
      // 
      // 
      // Add Client function
      // 
      // 
      function addClient(x) {
        let getNameClient = document.querySelector(".nameClient").value;
        let getPhoneClient = document.querySelector(".phoneClient").value;
        if (getNameClient==""){
          getNameClient = "Жаңы кардар";
        }
        document.querySelector(".trashShowBlock").innerHTML = `<img src="./img/loading-loading-forever.gif" alt="zagruzka..." width="40">`
        if (trash.length > 0) {
          let trashx =  trash.join("@")+"@"
          $.ajax({
                  url:'./upload.php',
                  type:'POST',
                  cache:false,
                  data:{x, trashx, getNameClient, getPhoneClient, kolElement, summaElement},
                  dataType:'html',
                  success: function (data) {
              // alert(data)
                    if (data == "loading") window.location.reload("./")
                    else{
                      // alert("Кошулду")
                      document.querySelector(".nameClient").value = "";
                      document.querySelector(".phoneClient").value = "";
                      document.querySelector(".fa-cart-shopping").innerHTML = `<span>${data}</span>`;
                      trash = []
                      show();
                      cartShow();
                    }
                    // document.querySelector(".workStart").classList.toggle("workStartNone");
                  }
              });
            }
      }
      function cart() {
        if (!document.querySelector(".trashNone") || document.querySelector(".cartActive")) document.querySelector(".trash").classList.toggle("trashNone");
        document.querySelector(".cart").classList.toggle("cartActive");
      }
      function addReportOC(){
        document.querySelector(".addReport").classList.toggle("addReportActive");
      }
      let userData = [];
      function addReport(idReport) {
        addReportOC();
        document.querySelector(".addReport").innerHTML = `<img src="./img/loading-loading-forever.gif" alt="zagruzka..." width="40" height="40">`;
          $.ajax({
                  url:'./upload.php',
                  type:'POST',
                  cache:false,
                  data:{idReport},
                  dataType:'html',
                  success: function (data) {
                    userData=[]
                    let sd = data.split("@");
                    for (let i = 0; i < sd.length; i++) userData.push(sd[i].split(','))
                    addReportShow();
                    // document.querySelector(".workStart").classList.toggle("workStartNone");
                  }
              });
          }
          function addReportShow() {
            // console.log(userData);
            let userDataN  = userData.length-1;
            let userDataKol = 0;
            let userDataSumma = 0;
            let ans = ``;
            for (let i = 0; i < userDataN; i++) {
              let userDataKolX = +userData[i][1];
              userDataKol += userDataKolX;
              let userDataSummaX = (+userData[i][3]) * (+userData[i][1])
              userDataSumma += userDataSummaX;
              ans += `
              <tr>
                  <td>${i+1}</td>
                  <td class="nameTable_${i}" >
                  ${userData[i][2]}
                    <input type="hidden" name="" class="idTable_${i}" value="1">
                  </td>
                  <td>
                    <input type="number" class="kolTable_${i}" value="${userDataKolX}" onchange="kolTable(${i})">
                  </td>
                  <td class="priceTable_${i}">${userData[i][3]}</td>
                  <td class="manyTable_${i}">${userDataSummaX}</td>
                  <td>
                    <input type="number" name="" value="${userData[i][4]}" onchange="matTable(${i})" class="matTable_${i}" id="">
                  </td>
                </tr>
              `;
            }
            document.querySelector(".addReport").innerHTML=`
            <div class="block">
              <div>
                <div class="header">
                  <span>
                    <i class="fa fa-pencil"> </i> Товарды оңдоп түзөп жиберүү
                  </span>
                  <span class="closed" onclick="addReportOC()">
                    &times;
                  </span>
                </div>
                <div class="report">
                  <button class="save" onclick="addReportSave(${userData[userDataN][2]})">
                    Сактоо
                  </button>
                </div>
                <div class="user">
                  <div>Саны: <span class="kolUser">${userDataKol}</span> </div>
                  <div>Акчасы: <span class="priceUser">${userDataSumma}</span>сом</div>
                  <div> <input type="text" class="nameUser" onchange="nameUser()" value="${userData[userDataN][0]}" placeholder="Кардардын аты"></div>
                  <div> <input type="tel" class="phoneUser" onchange="nameUser()" value="${userData[userDataN][1]}" placeholder="Телефон номери"></div>
                </div>
              </div>
              <table>
                <tr>
                  <th>№</th>
                  <th>Аталышы</th>
                  <th>Товар саны</th>
                  <th>Баасы</th>
                  <th>Акчасы</th>
                  <th>Материал саны</th>
                </tr>
                ${ans}
                
              </table>
            </div>
            `;
          }
          function kolTable(x) {
            x = +x;
            userData[x][1] = document.querySelector(`.kolTable_${x}`).value;
            addReportShow();
          }
          function nameUser() {
            userData[userData.length-1][0] = document.querySelector(".nameUser").value
            userData[userData.length-1][1] = document.querySelector(".phoneUser").value
          }
          function matTable(x) {
            x = +x;
            userData[x][4] = document.querySelector(`.matTable_${x}`).value; 
          }
          function addReportSave(idReportSave) {
            // alert(id);
            document.querySelector(".addReport").innerHTML = `<img src="./img/loading-loading-forever.gif" alt="zagruzka..." width="40" height="40">`;
            let userDataN  = userData.length-1;
            let userDataKol = 0;
            let userDataSumma = 0;
            let ans = ``;
            for (let i = 0; i < userDataN; i++) {
              let userDataKolX = +userData[i][1];
              userDataKol += userDataKolX;
              let userDataSummaX = (+userData[i][3]) * (+userData[i][1])
              userDataSumma += userDataSummaX;
              ans += `

              `;
            }
            let addReportTrash = userData.join("@");
            $.ajax({
                  url:'./upload.php',
                  type:'POST',
                  cache:false,
                  data:{idReportSave, addReportTrash},
                  dataType:'html',
                  success: function (data) {
                    // addReportShow();
                    document.querySelector(".fa-cart-shopping").innerHTML = `<span>${data}</span>`;
                    addReportOC();
                    cartShow()
                  }
              });
          }

          function buyProductCO() {
            document.querySelector(".buyProduct").classList.toggle("buyProductActive");
          }
          let buyProductArray = [];
          // let buyProductArrayShow = [];
          function buyProductGet() {
            buyProductCO();
            document.querySelector(".buyProduct").innerHTML = `<img src="./img/loading-loading-forever.gif" alt="zagruzka..." width="40" height="40">`;
            let getBuyProduct="get";
            $.ajax({
                  url:'./upload.php',
                  type:'POST',
                  cache:false,
                  data:{getBuyProduct},
                  dataType:'html',
                  success: function (data) {
                    buyProductArray = [];
                    var buyProductArrayX = data.split("@");
                    let buyProductArrayXN = buyProductArrayX.length;
                    for (let i = 0; i < buyProductArrayXN-1; i++) {
                      buyProductArray.push((buyProductArrayX[i]+",0,0,0,0").split(',')) 
                    }
                    buyProductShow();
                  }
              });
          }

          function buyProductShow() {
            let buyProductArrayN = buyProductArray.length;
            let s = ``;
            let c = ``, ycn = 1;
            for (let i = 0; i < buyProductArrayN; i++) {
              s += `
                <option value='${i}'>${buyProductArray[i][1]}</option>
              `;
              if (buyProductArray[i][2] == 1) {
                c += `
                <tr>
                  <td>${ycn++}</td>
                  <td>${buyProductArray[i][1]}</td>
                  <td><input type="number" class="addTovarName_count_${i}" placeholder ="0" onchange="addTovarName_count(${i})" value="${buyProductArray[i][3]}"></td>
                  <td><input type="number" class="addTovarName_price_${i}" placeholder ="0" onchange="addTovarName_count(${i})" value="${buyProductArray[i][4]}" ></td>
                  <td><input type="number" class="addTovarName_price_all_${i}" placeholder ="0" onchange="addTovarName_price_all(${i})" value="${buyProductArray[i][5]}"></td>
                </tr>
                `;
              }
            }
            document.querySelector(".buyProduct").innerHTML = `
            <div class="buyProduct_block">
            <div class="buyProduct_header">
              <div class="buyProduct_header_header">
                <span class="fa fa-circle-plus"> Сатып алынган товарды кошуу.</span>
                <span class="closed" onclick="buyProductCO()">&times;</span>
              </div>
              <div class="buyProduct_header_chooce">
                <select name="" id="tovarName">${s}</select>
          <button class="addTovarName" onclick="addTovarName()">
            Тандалган товарды кошуу
          </button>
        </div>
      </div>
      <table>
        <tr>
          <th>№</th>
          <th>Аты</th>
          <th>Саны</th>
          <th>Жеке баасы</th>
          <th>Жалпы баасы</th>
        </tr>
        ${c}
      </table>
      <button onclick="saveTovar()">
        Сактоо
      </button>
    </div>
          `;
          }
          function addTovarName() {
            let i = +document.querySelector("#tovarName").value
            buyProductArray[i][2] = 1;
            buyProductShow();
          }
          function addTovarName_count(i) {
            let addTovarNameCount = +document.querySelector(`.addTovarName_count_${i}`).value
            let addTovarNamePrice = +document.querySelector(`.addTovarName_price_${i}`).value
            buyProductArray[i][3] = addTovarNameCount;
            buyProductArray[i][4] = addTovarNamePrice;
            buyProductArray[i][5] = addTovarNameCount*addTovarNamePrice;
            buyProductShow();
          }
          function addTovarName_price_all(i) {
            let addTovarNamePriceAll = +document.querySelector(`.addTovarName_price_all_${i}`).value
            buyProductArray[i][5] = addTovarNamePriceAll;
            buyProductShow();
          }
          function saveTovar() {
            for (let i = 0; i < buyProductArray.length; i++) {
              if (buyProductArray[i][2] == 1) {
                let tovarNameFor = buyProductArray[i][1];
                let tovarIdFor = buyProductArray[i][0];
                let tovarCountFor = buyProductArray[i][3];
                let tovarPriceFor = buyProductArray[i][4];
                let tovarPriceAllFor = buyProductArray[i][5];
                $.ajax({
                  url:'./upload.php',
                  type:'POST',
                  cache:false,
                  data:{tovarNameFor,tovarIdFor,tovarCountFor,tovarPriceFor,tovarPriceAllFor},
                  dataType:'html',
                  success: function (data) {
                    buyProductShow();
                  }
              });
              }
            }
            buyProductArray = [];
            buyProductCO();
          }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>