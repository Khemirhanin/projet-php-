<?php
require_once('components/autoload.php');

$recipeRepository = new RecipeRepository();
$totalRequests = $recipeRepository->findRequests();                    
?>

<section>
        <table class="table table-striped">
            
            <?php            
            if(count($totalRequests)==0){
                echo "<h5>There are no requests at the moment</h5>";
            }else{
                ?>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Time</th>
                    <th>NbServings</th>
                    <th>Difficulty</th>
                    <th>UserId</th>

                </tr>
                <?php
                foreach($totalRequests as $request){
            ?>
            <tr>
                <td><?=$recipe->Id?></td>
                <td><img  class="recipeImg" src="img/recepie/<?=$recipe->Image?>" alt="<?=$recipe->Image?></"></td>
                <td><?=$recipe->Name?></td>
                <td><?=$recipe->Type?></td>
                <td><?=$recipe->Time?>mn</td>
                <td><?=$recipe->NbServings?></td>
                <td><?=$recipe->Difficulty?></td>
                <td><?=$recipe->IdUser?></td>
            </tr>
            <?php }
         } ?>
        </table>
    </section>