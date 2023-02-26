<?php
    require("./php/conn.php");
    require("./ok.php");
    if (isset($_POST["saveSalary"])){
        $nameDeveloper = $_POST["nameDeveloper"];
        $developerId = $_POST["developerId"];
        $money = $_POST["money"];
        $date = $_POST["date"];
        if($conn -> query("UPDATE orders SET get_developer='+' WHERE id_developers = '$developerId' and date_order < '$date' or id_developers = '$developerId' and date_order like '%$date%' "))
            $r = $conn -> query("INSERT INTO salary(id_creater, id_developers,date, money, name) VALUES($idCreater, $developerId,'$date',$money,'$nameDeveloper')");
    }
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
?>