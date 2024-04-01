<?php 
    require_once('components/autoload.php');
    require_once('components/adminHeader.php');
    $repository = new RecipeRepository();

?>
<link rel="stylesheet" href="css\request.css">
<div class="bradcam_area bradcam_bg_1" style="background-image: url(img/banner/bradcam.png);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Recipe Requests</h3>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="recipe_area inc_padding">
        <div class="container">
            <div class="row">
            <?php if (count($repository->findRequests())> 0){
            foreach ($repository->findRequests() as $recipe){ ?>
                <div class="card">
                    <div class="header">
                        <img src="img/recepie/<?=$recipe->Image?>" alt="food">
                    </div>
                    <div class="text">
                        <h3 class="food">
                            <?= $recipe->Name ?>
                        </h3>
                        <i class="fa fa-clock-o"> <?=$recipe->Time ?> Mins</i>
                        <i class="fa fa-users"> Serves <?=$recipe->NbServings ?></i>
                    </div>
                    <form action="requestProcess.php?recipe=<?=$recipe->Id?>" method="post">
                    <div class="row">
                        <div class="col">
                            <button type="submit" name ="request" value="accept" class = "btn accept">Accept</button>
                        </div>
                        <div class="col">
                        <button type="submit" name ="request" value="delete" class="btn delete">Delete</button>
                        </div>
                    </div> 
                    </form>       
                    <a href="request_details.php?recipe=<?= $recipe->Id?>" class="btn">view request</a>
            
                </div>
            <?php }}else 
                echo"<h2>No requests found</h2>";                ?>
        </div>
    </div>
</div>
<?php include 'components/footer.php'; ?>