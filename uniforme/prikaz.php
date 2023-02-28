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
    <link rel="stylesheet" href="index.css">

</head>
<body>


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

        // DOHVATANJE VELICINA

        // $velicina = $row['velicine_id'];
    
   
        
        // if($velicina == 1){
        //     $s = "S";
        // } else $s = NULL;
        // if($velicina == 2 ){
        //     $m = "M";
        // } else $s = NULL;
        // if($velicina == 3 ){
        //     $l = "L";
        // } else $s = NULL;
        // if($velicina == 4 ){
        //     $xl = "XL";
        // } else $s = NULL;

        // if($row['S']!=0){
        //     $s="S";
        // }else $s= NULL;
        // if($row['M']!=0){
        //     $m="M";
        // }else $m= NULL;
        // if($row['L']!=0){
        //     $l="L";
        // }else $l= NULL;
        // if($row['XL']!=0){
        //     $xl="XL";
        // } else $xl= NULL;

        ?>     

        <?php echo "<img src='{$row['put']}' alt=''>"; ?>
        <form method='POST' id="cartForm">
        
                <?php
                echo "<h2>$naziv</h2>";
                echo "<label for=''>Izaberi velicinu</label><br>";                  

                if($row['S'] == 'S'){
                    echo "<input type='radio' name='velicina' id='' value='S'>S";
                    echo "munem";
                }
                if($row['M'] == 'M'){
                    echo "<input type='radio' name='velicina' id='' value='M'>M";
                }
                if($row['L'] == 'L'){
                    echo "<input type='radio' name='velicina' id='' value='L'>L";
                }
                if($row['XL'] == 'XL'){
                    echo "<input type='radio' name='velicina' id='' value='XL'>XL";
                }
                echo "<input type='text' name='txt'>";
                echo "<br><label>Cena: </label>
                       <p>$cena</p>";
                ?>
                <button type='button'  class='btn-prikaz' onclick='submitForm(); openPopup();' name="dodaj_u_korpu"  id="btnForm">Dodaj u korpu</button>
  
        </form>
                

        <form id="my-form" method="post" action="">
            <label for="">afsdf</label>
  <input type="text" name="name">
  <button type="submit" name ="aleksa">Submit</button>
</form>


<div><?php

            if(isset($_POST['aleksa'])){
                echo "uspesno";
            } else {
                echo "neusopesno";
            }

        ?>
</div>



    <div class="popup "id="popup">
        <div class="scroll">
        <?php

            
                //KAO NOVI KOD KOJI NE RADI
                $radio = $_POST['txt'];
                echo $radio;
            
            if(isset($_POST['dodaj_u_korpu'])){
                    echo "fsfds";
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

                $korpa = $_SESSION['korpa'];

                if(array_key_exists($artikal_id, $korpa)) {
                    $korpa[$artikal_id]['kolicina'] += 1;
                    echo "111111111111111111";
                } else {
                    $korpa[$artikal_id] = $novi_artikal;
                    echo "2222222222222222";
                }
                
                $_SESSION['korpa'] = $korpa;
                

            }


    




                // STARI KOD ZA KORPU 

            // if(isset($_SESSION['cart'])){
            // echo "
            // <div class='korpa-naziv'>
            //  Korpa
            // </div>";
            
            // if($_SESSION['cart'][0] == 0 ){
            //     $_SESSION['cart'][0] = $artikal_id;
            // }
            
            // $temp=0;
            // foreach($_SESSION['cart'] as $key){
            //     if($key==$artikal_id)
            //         $temp=1;
            // }

            // if($temp==0){
            //     array_push($_SESSION['cart'],$artikal_id);
            //     $count=count($_SESSION['cart']);
            // }

            // foreach($_SESSION['cart'] as $key=>$value){
            //      // echo "<script>alert('Artikal je vec dodat u korpu!')</script>";
                
            // $sql= "SELECT * 
            //       FROM artikal 
            //       INNER JOIN slika on slika.artikal_id = artikal.id
            //       WHERE artikal.id = $value;";

            //      $result = $mysqli->query($sql) or die($mysqli->error);
            //      $row = $result->fetch_assoc();
            //      $naziv = $row['naziv'];
            //      $cena= $row['cena'];
            
            //         echo "
            //      <div class='popup-prikaz row'>
            //         <div class='col-4'>
            //             <img src ='{$row['put']}' class='popup-slika'>
            //         </div>
            //         <div class='popup-info col-8'>
            //                 <p>$naziv<br>
            //                 $cena RSD</p>
            //         </div>
            //      </div>";
            
            // }
        
            // }
        ?>
         </div>
            <div class="cart-btn">
                <a href='cart.php' ><button class='korpa-bttn'>Idi u Korpu</button></a>
            </div>
    </div>  
            
    <?php require_once "footer.php";?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</script>
    <?php require_once "footer.php";?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="javascript.js"></script>
</body>
</html>