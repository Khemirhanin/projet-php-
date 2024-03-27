<?php 
 require_once('components/autoload.php');
 $repository = new RecipeRepository();
 require_once('components/header.php');
 if(isset($_GET['recipe'])){

    $recipeId = (int)$_GET['recipe'];
    $recipe=$repository->findById($recipeId);
 }else{
    $recipeId = '';
    header('location:recipes.php');
 }
 
?>
<link rel="stylesheet" href="css/review.css">

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_review">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>write a review</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
  <!-- ================ review section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Review</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="reviewProcess.php?recipe=<?=$recipeId?>" method="post" id="reviewForm" novalidate="novalidate">
              <div class="col-12">
              <p>rating </p>
              </div>
              <ul class="rating col-12">
        <li>
            <input type='radio' value='5' name='rate' id="rate5"/>
            <label for="rate5"><span class="star" value="5">&#9733;</span></label>
        </li>
        <li>
            <input type='radio' value='4' name='rate' id="rate4"/>
            <label for="rate4"><span class="star" value="4">&#9733;</span></label>
        </li>
        <li>
            <input type='radio' value='3' name='rate' id="rate3"/>
            <label for="rate3"><span class="star" value="3">&#9733;</span></label>
        </li>
        <li>
            <input type='radio' value='2' name='rate' id="rate2"/>
            <label for="rate2"><span class="star" value="2">&#9733;</span></label>
        </li>
        <li>
            <input type='radio' value='1' name='rate' id="rate1"/>
            <label for="rate1"><span class="star" value="1">&#9733;</span></label>
        </li>
    </ul>
              <div class="col-12">
              <div class="form-group">
                  <textarea class="form-control w-100" name="title" id="reviewTitle" cols="30" rows="1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Title'" placeholder = 'Enter Title' required></textarea>
              </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="reviewMessage" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message' required></textarea>
                </div>
              </div>
              </div>
          <div class="col-lg-4">
            <img id="reviewImg" src="img/recepie/<?=$recipe->Image?>" >
            <h2 class="contact-title" id="recipeName"><?=$recipe->Name?></h2>
          </div>
            <div class="col-12">
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Submit Review</button>
            </div>
            </div>
          </form>
        </div>
        </div>
  </section>
  <!-- ================ review section end ================= -->
  <script src="js/review.js"></script>
  <?php include 'components/footer.php'; ?>