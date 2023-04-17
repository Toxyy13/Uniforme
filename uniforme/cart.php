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
    <link rel="stylesheet" href="stil.css">

</head>
<body>
    <div class="cart-container">
    <?php require_once "nav.php";?> 

    <div class="cart-box row">
            
            <!-- // $ukupna_cena = 0;

            // if(isset($_SESSION['items'])){
            //     $items = $_SESSION['items'];
            //     $ukupna_cena = 0;
            //     foreach($items as $artikal){

            //         $id = $artikal['id'];
            //         $velicina = $artikal['velicina'];

            //         $sql = "SELECT * 
            //                 FROM artikal 
            //                 INNER JOIN slika on slika.artikal_id = artikal.id
            //                 WHERE artikal.id = $id;";

            //         $result = $mysqli->query($sql) or die($mysqli->error);
            //         $row = $result->fetch_assoc();

            //         $naziv = $row['naziv'];
            //         $cena= $row['cena']; 
            //         $put = $row['put'];
            //         $ukupna_cena = $ukupna_cena + $cena;

            //         echo "
            //               <div class=''>
                          
            //                 <div class='cart-img'>
            //                     <img src ='{$put}' >
            //                 </div>
        
            //                 <div class='cart-info'>
                                
            //                         <p>$naziv<br>
            //                         $cena RSD $velicina</p>
            
            //                 </div>
            //              </div>";
            //     }
            // } 
            //  -->
    

        <?php
            $ukupna_cena = 0;
                foreach ($_SESSION['items'] as $item){
                    $artikal_id = $item['id'];
                    $velicina = $item['velicina'];

                    $sql = "SELECT * 
                            FROM artikal 
                            INNER JOIN slika on slika.artikal_id = artikal.id
                            WHERE artikal.id = $artikal_id;";

                    $result = $mysqli->query($sql) or die($mysqli->error);
                    $row = $result->fetch_assoc();
                    $naziv = $row['naziv'];
                    $cena = $row['cena'];
                    $put = $row['put'];
                    $ukupna_cena += $cena;

                    echo "
                    <div>
                        <span class='cart-img'>
                            <img src ='{$put}' >
                        </span>

                        <span class='cart-info'>
                            
                                <p>$naziv<br>
                                $cena RSD</p><br>
                                $velicina
                                <form method='POST'>
                                    <input type='hidden' name='id' value= '$artikal_id'>
                                    <input type='hidden' name='velicina' value= '$velicina'>
                                    <input type='submit' value='Izbrisi iz korpe' >
                                </form>
                        </span>
                    </div>";
                    
                }

            ?>

            <?php 
                if(isset($_POST['id']) && isset($_POST['velicina'])){
                   
                    $id = $_POST['id'];   
                    $vel = $_POST['velicina'];
                   
                    ukloniElementPoIdIVelicini($id, $vel);
                   
                    // header("Refresh:0");
                }
            ?>



    <?php
    if(isset($_SESSION['cart'])){
       echo "<div class='cart-price'>
            <span> <a href='index.php'><button>Nazad</button></a></span>
            <span>
                    echo 'Ukupna cena korpe je $ukupna_cena RSD';
                
            </span>
            <span> <a href='form.php'><button>Dalje</button></a></span>
        </div>";
    }
    ?>
</div>
<script>
document.getElementById("refresh-button").addEventListener("click", function() {
  setTimeout(function() {
    location.reload();
  }, 4000);
});
</script>
    <script src="index.js" type="text/jsx"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php require_once "footer.php";?>
    <script src="skripta.js"></script>
</body>
</html>