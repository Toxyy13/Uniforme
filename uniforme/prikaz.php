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
              WHERE artikal.id = $artikal_id;";
              

        $result = $mysqli->query($sql) or die($mysqli->error);
        $row = $result->fetch_assoc();
        $naziv = $row['naziv'];   
        $cena = $row['cena'];
        $velicina = $row['velicine_id'];
    
   
        
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
        <form action= "cart.php" method='POST' id="cartForm">
        
                <?php
                echo "<h2>$naziv</h2>";
                echo "<label for=''>Izaberi velicinu</label><br>";                  

                if($velicina == 1){
                    echo "<input type='radio' name='velicina' id='' value='S'>S";
                }
                if($velicina == 2){
                    echo "<input type='radio' name='velicina' id='' value='M'>M";
                }
                if($velicina == 3){
                    echo "<input type='radio' name='velicina' id='' value='L'>L";
                }
                if($velicina == 4){
                    echo "<input type='radio' name='velicina' id='' value='XL'>XL";
                }
                        
                echo "<br><label>Cena: </label>
                       <p>$cena</p>";
                ?>
                <button type='button'  class='btn-prikaz' onclick='openPopup(); submitForm();' name="dodaj_u_korpu"  id="btnForm">Dodaj u korpu</button>
  
        </form>
                





    <div class="popup "id="popup">
        <div class="scroll">
        <?php

            
                //KAO NOVI KOD KOJI NE RADI
            // $radio= $_POST['velicina'];
            // echo "$radio";
            
            // if(isset($POST["dodaj_u_korpu"])){
            //         echo "fsfds";
            //     $sql= "SELECT *
            //         FROM artikal
            //         INNER JOIN slika on artikal.id = slika.artikal_id
            //         WHERE artikal.id = $artikal_id";
            //     $result = $mysqli->query($sql) or die($mysqli->error);
            //     $artikal = $result->fetch_accos();

            //     $novi_artikal = array(
            //         'id' => $artikal['id'],
            //         'naziv' => $artikal['naziv'],
            //         'cena' => $artikal['cena'],
            //         // 'velicina' => $artikal['velicina'],
            //         'kolicina' => 1
            //     );

            //     $korpa = $_SESSION['korpa'];

            //     if(array_key_exists($artikal_id, $korpa)) {
            //         $korpa[$artikal_id]['kolicina'] += 1;
            //         echo "111111111111111111";
            //     } else {
            //         $korpa[$artikal_id] = $novi_artikal;
            //         echo "2222222222222222";
            //     }
                
            //     $_SESSION['korpa'] = $korpa;
                

            // }


    




                // STARI KOD ZA KORPU 

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
            
                    echo "
                 <div class='popup-prikaz row'>
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
        ?>
         </div>
            <div class="cart-btn">
                <a href='cart.php' ><button class='korpa-bttn'>Idi u Korpu</button></a>
            </div>
    </div>  
        
     <?php require_once "footer.php";?>
<script>
const popup = document.querySelector('.popup');
const body = document.querySelector('body');
const btnPrikaz = document.querySelector('.btn-prikaz');

btnPrikaz.addEventListener('click', function() {
  togglePopup();
});

function togglePopup() {
  popup.classList.toggle('open-popup');
  body.classList.toggle('blur');
  // provjerava da li je popup otvoren
  
}

popup.addEventListener('click', function(e) {
  // ako se klikne izvan popupa zatvara se popup
  if (e.target !== popup) {
    togglePopup();
  }
});


document.addEventListener('keyup', function(e) {
  // ako se pritisne Escape zatvara se popup
  if (e.key === 'Escape' && popup.classList.contains('open-popup')) {
    togglePopup();
  }
});

// Sakrij popup element kada se stranica učita
popup.classList.remove('open-popup');




// function submitForm() {
//   var form = document.getElementById("cartForm");
//   var xhr = new XMLHttpRequest();                        ne brisati
//   xhr.open("GET", "prikaz.php", true);
//   xhr.onload = function() {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//       console.log(xhr.responseText);
//     }
//   };
//   xhr.send(new FormData(form));
// }

</script>
    <?php require_once "footer.php";?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>