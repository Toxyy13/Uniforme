
    
<nav >

    <a href="index.php" class="logonaslov"><img src="logo.png" id="logo" alt="POCETNA"></a>
    
    <div class="vrsta">
        <a href="" class="meni">
            ZENSKA UNIFORMA</a>
        <ul class="vrste"><br><br>
            <li><a href="index.php?vrsta=bluze">Bluze</a></li><br>
            <li><a href="index.php?vrsta=pantalone">Pantalone</a></li><br>
            <li><a href="index.php?vrsta=mantil">Mantil</a></li><br>
            <li><a href="index.php?vrsta=haljine">Haljine</a></li><br>
            <li><a href="index.php?vrsta=suknje">Suknje</a></li><br>
        </ul>
    </div>
    <div class="vrsta">
        <a href="" class="meni">MUSKA UNIFORMA</a>
        <ul class="vrste"><br><br>
            <li><a href="index.php?vrsta=bluzeM">Bluze</a></li> <br>
            <li><a href="index.php?vrsta=pantaloneM">Pantalone</a></li><br>
            <li><a href="index.php?vrsta=mantilM">Mantil</a></li><br>

        </ul>
    </div>
    <a href="" class="meni">KAPE</a>
    <a href="" class="meni">MAJICE</a>
    <a href="cart.php" class="cart meni">
            <i class="bi bi-cart" id="cart"></i>
            <?php 
                if(isset($_SESSION['cart'])){
                    $korpa = $_SESSION['cart'];
                    $count = count($korpa);
                    
                    echo "<span>$count</span>";
                } 
                else 
                    echo "<span>0</span>";

            ?>
    </a>
</nav>




