<?php 
    require_once('components/autoload.php');
    require_once('components/adminHeader.php');

    $repository = new RecipeRepository();

    if(isset($_GET['recipe'])){
         $recipeId = (int)$_GET['recipe'];
        $recipe=$repository->findById($recipeId);
    }else{
        $recipeId = '';
        header('location:recipes.php');
    }
?>

<link rel="stylesheet" href="css\request.css">
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Request Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="recepie_details_area">


        <?php  if(!empty($recipe)){ ?>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-md-6">
                            <div class="recepies_thumb">
                            <img src="img/recepie/<?=$recipe->Image?>" alt="food">
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="recepies_info">
                                <h3><?=$recipe->Name?></h3>
                                <div class="resepies_details">
                                    <ul>
                                        <li><p><strong>Time</strong> : <?=$recipe->Time?> Mins </p></li>
                                        <li><p><strong>Category</strong> : <?=$recipe->Type?> </p></li>
                                        <h3 style="margin-top:15px;">Ingredients</h3>
                                        <p><?= $recipe->Ingredients?> </P>
                                    </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="recepies_text">
                                <p><?= $recipe->Description?></p>
                            </div>
                        </div>
                    <form action="requestProcess.php?recipe=<?=$recipe->Id?>" method="post">
                        <div class="row">
                        <div class="col">
                            <button type="submit" name ="request" value="accept" class = "accept btn-request">Accept</button>
                        </div>
                        <div class="col">
                            <button type="submit" name ="request" value="delete" class="delete btn-request">Delete</button>
                        </div>
                    </div> 
                    </form> 
                        </div>
                        
                    </div>
        <?php }else{ ?>
            <h2>No recipe found</h2>
        <?php } ?>
    </div>
    <?php include 'components/footer.php'; ?>