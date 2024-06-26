<?php 
    require_once('components/header.php');

    $repository = new RecipeRepository();
    $reviewRepository = new ReviewRepository();
    $userRepository = new UserRepository();
    if(isset($_GET['recipe'])){
         $recipeId = (int)$_GET['recipe'];
        $recipe=$repository->findById($recipeId);
    }else{
        $recipeId = '';
        header('location:recipes.php');
    }

    
?>
<link rel="stylesheet" href="css\commmentSection.css">
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Recipe Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="recepie_details_area">

        <!-- check if the recipe truly exists -->
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
                                        <li>
                                            <p><strong>Rating</strong> : 
                                            <?php 
                                            // display the rating in stars format : full star for each rating and empty star for the rest
                                                $averageRating = $recipe->AverageRating;
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $averageRating) {
                                                        echo '<i class="fa fa-star"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-star-o"></i>';
                                                    }
                                                }
                                            ?>
                                            </p>
                                        </li>
                                     </p></li>
                                        <li><p><strong>Time</strong> : <?=$recipe->Time?> Mins </p></li>
                                        <li><p><strong>Category</strong> : <?=$recipe->Type?> </p></li>
                                        <h3 style="margin-top:15px;">Ingredients</h3>
                                        <p><?= $recipe->Ingredients?> </P>
      
                                    </li>
                                        
                                    </ul>
                                </div>
                                <div class="links">
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                    <a href="#"> <i class="fa fa-linkedin"></i> </a>
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
                            <div class="form-group mt-3">
                        <a href="review.php?recipe=<?=$recipeId?>" class="button button-contactForm btn_4 boxed-btn">Write a Review</a>
                        </div>
                        <div class="form-group mt-3">
                        <a href="generatePdf.php?recipe=<?= $recipe->Id?>" class="button button-contactForm btn_4 boxed-btn" style="margin-left:30px;"><i class="fa fa-download"></i> Download PDF</a>
                        </div>
                        
                    </div>
                    <br>
                    <div class="comment-section">
                        <h3 class="contact-title" >Reviews</h3>
                        <?php 
                        if (($reviewRepository->findReviewByRecipe($recipeId))){
                            
                            foreach ($reviewRepository->findReviewByRecipe($recipeId) as $review){ ?>
                                <div class="review-box">
                                <div class="review-head">
                                    <h3 class="contact-title review-author">
                                        <?php $user = $userRepository->findById($review->User);
                                            if(!$user){
                                                echo"deleted user";
                                            }
                                            else{
                                                echo $user->UserName;
                                            }};
                                        
                                        ?>
                                    </h3>
                                <div class = "rating">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $review->Rate) {
                                echo '<span class="star active">&#9733;</span>';
                            } else {
                                echo '<span class="star">&#9733;</span>';
                            }
                            };
                        ?>
                        </div>
                        </div> 
                        <div class= "review-title"><?=$review->Title?></div>
						<div class="review-content">
							<?=$review->Description?>
						</div>
                    </div>
                    
                    
                </div>



        <?php }else{ ?>
                <h2>No review found</h2> 
        <?php }}else{ ?>
            <h2>No recipe found</h2>
        <?php } ?>
    </div>

    <!-- recepie_area_start  -->
    <div class="recepie_area inc_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_1.png" alt="">
                        </div>
                        <h3>Egg Manchurian</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="#" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_2.png" alt="">
                        </div>
                        <h3>Pure Vegetable Bowl</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="#" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_3.png" alt="">
                        </div>
                        <h3>Egg Masala Ramen</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="#" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->
    <?php include 'components/footer.php'; ?>