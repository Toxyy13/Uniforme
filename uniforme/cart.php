<?php
        require_once "functions.php";
        $table = 'artikal';
        $sql="SELECT * FROM $table";
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <div class="cart-container">
    <?php require_once "nav.php";?>

    
    <div class="cart-box row">

        <?php


            if(isset($_SESSION['korpa'])) {
                $korpa = $_SESSION['korpa'];
                foreach($korpa as $artikal) {
                echo $artikal['naziv'] . " x " . $artikal['kolicina'] . "<br>";
                echo "Cijena: " . $artikal['cijena'] . " KM <br>";
                echo "<form action='azuriraj_korpu.php' method='post'>";
                echo "<input type='hidden' name='artikal_id' value='" . $artikal['id'] . "'>";
                echo "Količina: <input type='number' name='kolicina' min='1' value='" . $artikal['kolicina'] . "'>";
                echo "<button type='submit' name='azuriraj_kolicinu'>Ažuriraj</button>";
                echo "<button type='submit' name='ukloni_iz_korpe'>Ukloni</button>";
                echo "</form>";
                echo "<br>";
                }
            } 
            
            
            // foreach($_SESSION['cart'] as $key=>$value){
            //     $result = $mysqli->query("SELECT * FROM $table WHERE artikal.id=$value") or die($mysqli->error);
            //     $row = $result->fetch_assoc();
            //     $naziv = $row['naziv'];
            //     $cena= $row['cena'];

            //     echo "
            //       <div class='col-3'>
            //         <div class='cart-img'>
            //             <img src ='{$row['slika']}' >
            //         </div>

            //         <div class='cart-info'>
                        
            //                 <p>$naziv<br>
            //                 $cena RSD</p>
    
            //         </div>
            //      </div>";

            // }

            // $product_id = array_column($_SESSION['cart'],'product_id');

            // foreach($_SESSION['cart'] as $key=>$value){

            //     echo $value;

            //     $sql="SELECT * FROM $table WHERE id='{$artikal_id}'";

            //     $result = $mysqli->query($sql) or die($mysqli->error);

            //     $row = mysqli_fetch_assoc($result);

            //     cartElement($row['slika'],$row['naziv'],$row['cena']);
                
            // }


            // while($row=mysqli_fetch_assoc($result)){
            //     foreach($product_id as $id){
            //         if($row['id']==$id){
            //             cartElement($row['product_img'],$row['product_name'],$row['product_price']);
            //         }
            //     }
            // }

        ?>

    </div>
    </div>
    <div class="cart-price">

    </div>

    <script src="index.js" type="text/jsx"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php require_once "footer.php";?>
    <script src="skripta.js"></script>
</body>
</html>