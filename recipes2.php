<?php 

    require_once('components/autoload.php');
    require_once('components/header.php');
    $repository = new RecipeRepository();

    
?>
<link rel="stylesheet" href="css/recipes.css">

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1" style="background-image: url(../img/pasta-1181189_1920.jpg); opacity:0.9;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                    <h3 id="searchtitletxt1">Discover Our Recipes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

 
    <!-- recepie_area_start  -->
    
<div class="recipe_area inc_padding">
        <div class="container">
            <div class="row">
            <?php if (count($repository->findAll())> 0){
            foreach ($repository->findAll() as $recipe){ ?>
                <div class="card">
                    <div class="header">
                        <img src="../img/recepie/<?=$recipe->Image?>" alt="food">
                            <div class="icon">
                                <a href="#"><i class="fa fa-heart-o"></i></a>
                        </div>

                    </div>
                    <div class="text">
                        <h3 class="food">
                            <?= $recipe->Name ?>
                        </h3>
                        <i class="fa fa-clock-o"> <?=$recipe->Time ?> Mins</i>
                        <i class="fa fa-users"> Serves <?=$recipe->NbServings ?></i>
                    
                        <div class="stars">
                            <?php  ?>
                            <li>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
                            </li>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="recipes_details.php?recipe=<?= $recipe->Id; ?>" class="btn">Let's Cook!</a>


                        </div>
                        <div class="col">
                        <a href="review.php?recipe=<?=$recipe->Id?>" class="btn">Add review!</a>
                        </div>
                    </div>
                    
                    <a href="generatePdf.php?recipe=<?= $recipe->Id; ?>" class="btn download"><i class="fa fa-download"></i> Download PDF</a>
                </div>
            <?php }}else 
                echo"<h2>No recipes found</h2>";                ?>
        </div>
    </div>
</div>



    <div class="latest_trand_area" style="background-image: url(../img/pasta-2978381_1920.jpg); opacity:0.9;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                       
                        <h3>Share Your Recipe With Us!!</h3>
                        <a href="#" class="boxed-btn3">Share Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_trand     -->

   

    <?php include 'components/footer.php'?>

   