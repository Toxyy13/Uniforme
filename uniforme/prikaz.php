<?php
    require_once "functions.php";
    $title = "prikaz";
    $table= 'artikal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="stil.css">

</head>

<body class="prikazbody">
<div class="prikazwrap">
    <?php

    require_once "nav.php";            
        
        if(isset($_GET['id'])){ 
            $artikal_id = $_GET['id'];
        }

        $sql= "SELECT *
              FROM artikal
              INNER JOIN slika on artikal.id = slika.artikal_id 
              WHERE artikal.id = $artikal_id";
              
        $result = $mysqli->query($sql) or die($mysqli->error);
        $row = $result->fetch_assoc();
        $naziv = $row['naziv'];   
        $cena = $row['cena'];
        $opis = $row['opis'];

    ?>   


    <?php echo "<img src='{$row['put']}' alt='' class='shopimg'>"; ?>

    <form action="cart.php" method="post" class="cartForm">
        
        <?php

            echo "<h2>$naziv</h2>";
            echo "<label for=''><h5>Izaberi velicinu</h5></label><br>";                  
                
            if($row['2XS'] == 1){
                echo "<input type='radio' name='velicina' id='' value='2XS' required>2XS";
            }
            if($row['XS'] == 1){
                echo "<input type='radio' name='velicina' id='' value='XS' required>XS";
            }
            if($row['S'] == 1){
                echo "<input type='radio' name='velicina' id='' value='S' required>S";
            }
            if($row['M'] == 1){
                echo "<input type='radio' name='velicina' id='' value='M' required>M";
            }
            if($row['L'] == 1){
                echo "<input type='radio' name='velicina' id='' value='L' required>L";
            }
            if($row['XL'] == 1){
                echo "<input type='radio' name='velicina' id='' value='XL' required>XL";
            }
            if($row['2XL'] == 1){
                echo "<input type='radio' name='velicina' id='' value='2XL' required>2XL";
            }
            if($row['3XL'] == 1){
                echo "<input type='radio' name='velicina' id='' value='3XL' required>3XL";
            }

            echo "<div>
                     <h5>Opis: </h5>
                     <p>$opis</p>
                </div>";
                
            echo "<br><label><h5>Cena: <h5></label>
                 <p>$cena</p>";

        ?>

        <button type='submit'  class='btn-prikaz' name="dodaj_u_korpu" onclick="" id="btnForm">Dodaj u korpu</button>
    
    </form>

    <div>
        <?php
        if(isset($_POST['velicina'])){
              $radio_button = $_POST['velicina'];
            }
        ?> 
    </div>

     <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dodaj_u_korpu'])){
                              
            if(isset($_GET['id'])){ 
                $artikal_id = $_GET['id'];
             }

                $sql= "SELECT *
                    FROM artikal
                    INNER JOIN slika on artikal.id = slika.artikal_id
                    WHERE artikal.id = $artikal_id";

                $result = $mysqli->query($sql) or die($mysqli->error);
                $artikal = mysqli_fetch_assoc($result);

                $novi_artikal = array(
                    'id' => $artikal['id'],
                    'naziv' => $artikal['naziv'],
                    'cena' => $artikal['cena'],
                    'velicina' => $_POST['velicina'],
                    'kolicina' => 1
                );

                if(isset($_SESSION['cart'])) {
                    $korpa = $_SESSION['cart'];
                    // provjera postoji li artikal u korpi
                    if(array_key_exists($artikal_id, $korpa)) {
                      $korpa[$artikal_id]['kolicina'] += 1;
                    } else {
                      $korpa[$artikal_id] = $novi_artikal;
                    }
                  } else {
                    $korpa = array($artikal_id => $novi_artikal);
                  }
                
                $_SESSION['cart'] = $korpa;
                
                foreach($korpa as $artikal) {
                    echo $artikal['naziv'] ;
                    echo " " . $artikal['velicina']. "<br>";
                }
            } else {
              
            }
        ?>


    <!-- <div class="popup "id="popup">
        <div class="scroll">
        
        

            KAO NOVI KOD KOJI NE RADI


            if(isset($_POST['cartForm'])){

                $sql= "SELECT *
                    FROM artikal
                    INNER JOIN slika on artikal.id = slika.artikal_id
                    WHERE artikal.id = $artikal_id";

                $result = $mysqli->query($sql) or die($mysqli->error);
                $artikal = $result->fetch_accos();

                $novi_artikal = array(
                    'id' => $artikal['id'],
                    'naziv' => $artikal['naziv'],
                    'cena' => $artikal['cena'],
                    // 'velicina' => $artikal['velicina'],
                    'kolicina' => 1
                );

                if(isset($_SESSION['cart'])) {
                    $korpa = $_SESSION['cart'];
                    // provjera postoji li artikal u korpi
                    if(array_key_exists($artikal_id, $korpa)) {
                      $korpa[$artikal_id]['kolicina'] += 1;
                    } else {
                      $korpa[$artikal_id] = $novi_artikal;
                    }
                  } else {
                    $korpa = array($artikal_id => $novi_artikal);
                  }
                
                $_SESSION['cart'] = $korpa;
                
               

            }

                STARI KOD ZA KORPU 

            if(isset($_SESSION['cart'])){
                
                echo "
                <div class='korpa-naziv'>
                 Korpa
                </div>";

            if($_SESSION['cart'][0] == 0 ){
                $_SESSION['cart'][0] = $artikal_id;
            }
            
            $temp=0;
            foreach($_SESSION['cart'] as $key){
                if($key==$artikal_id)
                    $temp=1;
            }

            if($temp==0){
                array_push($_SESSION['cart'],$artikal_id);
                $count=count($_SESSION['cart']);
            }

            foreach($_SESSION['cart'] as $key=>$value){
                 // echo "<script>alert('Artikal je vec dodat u korpu!')</script>";
                
                $sql= "SELECT * 
                    FROM artikal 
                    INNER JOIN slika on slika.artikal_id = artikal.id
                    WHERE artikal.id = $value;";

                    $result = $mysqli->query($sql) or die($mysqli->error);
                    $row = $result->fetch_assoc();
                    $naziv = $row['naziv'];
                    $cena= $row['cena'];
                
                        echo "  <div class='popup-prikaz row'>
                                    <div class='col-4'>
                                        <img src ='{$row['put']}' class='popup-slika'>
                                    </div>
                                    <div class='popup-info col-8'>
                                            <p>$naziv<br>
                                            $cena RSD</p>
                                    </div>
                                </div>";     
            }
        }
        
          </div>
             <div class="cart-btn">
                <a href='cart.php' ><button class='korpa-bttn'>Idi u Korpu</button></a>
             </div> -->

     </div>  
    
    <?php require_once "footer.php";?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
</body>
</html>