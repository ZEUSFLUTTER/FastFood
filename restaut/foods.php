<?php include('header.php'); ?>
   <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="GET">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Menu</h2>

        <!-- Ablo -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/Ablo/ablo1.jpeg" alt="Akoume" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Ablo</h4>
                <p class="food-detail">
                    Ablo, un plat traditionnel à base de maïs, servi avec divers ragoûts.
                </p>
                <br>

                <a href="ablo.php" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>



        <!-- Riz -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/riz/riz.jpeg" alt="Riz" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Riz</h4>
                <p class="food-detail">
                    Riz simple, servi avec poulet, poisson ou ragoût de viande.
                </p>
                <br>

                <a href="Riz.php" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>

        <!-- Fufu -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/khom/khom.jpeg" alt="Fufu" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Khom</h4>
                <p class="food-detail">
                    khom, une pâte de manioc accompagnée de sauce au choix, viande ou poisson.
                </p>
                <br>

                <a href="khom.php" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>

        <!-- Pinon -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/pinon/pinon.jpeg" alt="Pinon" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Pinon</h4>
                <p class="food-detail">
                    Pinon, un plat à base de plantain écrasé, servi avec poisson ou viande.
                </p>
                <br>

                <a href="Pinon.php" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>


        <div class="clearfix"></div>
    </div>
</section>


    <?php include('footer.php'); ?>


</body>
</html>