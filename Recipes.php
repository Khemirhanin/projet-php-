<?php 

    require_once('components/autoload.php');
    $repository = new RecipeRepository();
    require_once('components/header.php');
    
?>
<style >
@import url('https://fonts.googleapis.com/css?family=Roboto');

// VARIABLES
$bg: url("https://wallpaperscraft.com/image/coffee_coffee_beans_cupcake_candy_93301_1920x1080.jpg") no-repeat center;
$food: url("http://img.taste.com.au/UZVXAdo7/taste/2016/11/chinese-egg-noodle-and-vegetable-stir-fry-94186-1.jpeg") no-repeat center;

// FONT
$font: 'Roboto', sans-serif;

// COLORS
$white: #fff;
$black: #212129;
$gray: #9B9B9B;
$heart: #17BEBB;
$star: #FFE500;
$button: #EF3E36;

* {
   margin: 0;
   padding: 0;
   font-family: $font;
   list-style-type: none;
   text-decoration: none;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   -o-box-sizing: border-box;
   box-sizing: border-box;
}

img {
   max-width: 100%;
}

.card {
   position: relative;
   background: $white;
   max-width: 300px;
   margin: 20px auto;
box-shadow: 2px 3px 20px -1px rgba(0,0,0,0.65);
   height:400px;
   text-align:center;
   display:flex;
   .header {
      background-size: cover;
      min-height: 160px;
         .icon a .fa-heart-o {
         position: absolute;
         left: 85%;
         bottom: 39.7%;
         background: $heart;
         color: $white;
         font-size: 1.3em;
         display:flex;
         font-weight: bold;
         padding: 10px;
         margin-left:5px;
         border-radius: 50%;
         box-shadow: 0px 5px 30px 1px $heart;
      }
      .icon a .fa-heart-o:active{
    background: #ffc000;
    color: #fff;
}
      .icon a .fa-heart-o:hover{
    background: #ffc000;
    color: #fff;
}

   }
   .header img{
    height:200px;
    width:300px;
   }
   .text {
      .food {
       
         color: $black;
         font-weight: normal;
         text-transform: uppercase;
         letter-spacing: 0.1em;
         margin: 5px 10px;
      }
      .fa-clock-o {
         color: $gray;
         margin: 0 30px;
      }
      .fa-users {
         color: $gray;
      }
   }
   .stars {
      margin: 5px 30px;
      li a i {
         color: $star;
      }
   }
   .info {
      margin: 5px 30px;
   }
   a.btn {
    display: inline-block;
    font-size: 12px;
    color: #000000;
    border: 1px solid #ffc000;
    text-transform: capitalize;
    padding: 8px 34px;
    font-weight: 500;
    width:120px;
    text-align:center;
    font-family: "Roboto", sans-serif;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;

}
a.btn:hover{
    background: #ffc000;
    color: #fff;
}
.btn.download {
    
   
    width:190px;
    margin-left:50px;
    margin-top:10px;
    margin-bottom:10px;

}

   }

</style>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1" style="background-image: url(img/pasta-1181189_1920.jpg);  opacity:0.9;" id="searchtitle12">
        <div class="container" >
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
    
    <div class="recepie_area inc_padding" >
        <div class="container">
            <div class="row"  id="Recipiezone12">
            <?php if (count($repository->findAll())> 0){
            foreach ($repository->findAll() as $recipe){ ?>
                <div class="card">
                    <div class="header">
                        <img src="img/recepie/<?=$recipe->Image?>" alt="food">
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
                            <a href="review.php?recipe=idRecipe" class="btn">Add review!</a>
                        </div>
                    </div>
                    
                    <a href="generatePdf.php?recipe=<?= $recipe->Id; ?>" class="btn download"><i class="fa fa-download"></i> Download PDF</a>
                </div>
            <?php }}else 
                echo"<h2>No recipes found</h2>";                ?>
        </div>
    </div>
    <div class="latest_trand_area" style="background-image: url(img/pasta-2978381_1920.jpg); opacity:0.9;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                       
                        <h3>Share Your Recipe With Us!!</h3>
                        <a href="Submit_Request.php" class="boxed-btn3">Share Recipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_trand     -->
    <?php include 'components/footer.php'; ?>