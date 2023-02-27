<?php 
    require("./ok.php");
    require("./php/conn.php");
    if (isset($_POST["get"])) {
        $get = $_POST["get"];
        if ($get == "getBuy") {
            $r = $conn -> query ("SELECT * FROM buyProducts ORDER BY id DESC");
            $n = mysqli_num_rows($r);
            if ($n) {
                $row = mysqli_fetch_array($r);
                echo '[';
                do {	
                    echo'{"id":'.$row["id"].',"name_product":"'.$row["name_product"].'","price_product":'.$row["price_product"].', "count_product":'.$row["count_product"].',"all_price_product":'.$row["all_price_product"].',"date_product":"'.$row["date_product"].'"},';
                } while ($row = mysqli_fetch_array($r));
            }
            echo '{}]';
        }
    }
?>