<?php 
    include('components/header.php'); 
    
    $repository = new userRepository();
    if(isset($_COOKIE['user_id'])){
        $user = $repository->findById($_COOKIE['user_id']);
        
    }
    $recipeReposiotry = new RecipeRepository();
?>
<link rel="stylesheet" href="css/recipes.css">
<link rel="stylesheet" href="css/viewMyPosts.css">

   <!-- bradcam_area  -->
   <div class="bradcam_area bradcam_bg_1" style="background-image: url(../img/copy-space-ingredients-italian-food.jpg); opacity:0.9;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                    <h3 style="text-align:left;">Welcome to your Profile <br><?= $user->UserName ?></h3>
                </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="recipe_area inc_padding">
        <div class="container">
        <div class="row" >
            <?php 
            // get all the recipes of the user
            $recipes = $recipeReposiotry->findByUserId($_COOKIE['user_id']);
            if (count($recipes) > 0){
                foreach ($recipes as $recipe){ 
            ?>
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
                        <?php //check if the recipe has been confirmed by the admin 
                        if($recipe->Confirm == 1){ ?> 
                        <div class="col">
                        <a href="review.php?recipe=<?=$recipe->Id?>" class="btn">Add review!</a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if($recipe->Confirm == 1){ ?>
                    <a href="generatePdf.php?recipe=<?= $recipe->Id; ?>" class="btn download"><i class="fa fa-download"></i> Download PDF</a>
                    <?php }else{ ?>
                        <div class="alert alert-warning" role="alert">
                            this recipe has not been  confirmed yet
                        </div>
                    <?php } ?>

                </div>
            <?php }} else { ?>
            <div class="suggestion"> 
                <div class="alert alert-info" role="alert">
                No recipes found
                </div>
                <div><Button class="share" ><a href="Submit_request">Share Recipes </Button></a></div>
            </div>
            <?php } ?>



        </div>
    </div>
</div>
<!-- /bradcam_area  -->
<?php     include('components/footer.php');?>
