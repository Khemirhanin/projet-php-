<?php

$con=mysqli_connect("localhost","root","","foodHub");
?>
<section>
        <table class="table table-striped">
            
            <?php
            
            //Get the connected users
                $totalRecipes = mysqli_query($con," SELECT * from recipes ");                
            
            if(mysqli_num_rows($totalRecipes)==0){
                echo "<h5>There are no saved recipes</h5>";
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
                foreach($totalRecipes as $recipe){
            ?>
            <tr>
                <td><?=$recipe['Id']?></td>
                <td><img  class="recipeImg" src="img/recepie/<?=$recipe['Image']?>" alt="<?=$recipe['Image']?></"></td>
                <td><?=$recipe['Name']?></td>
                <td><?=$recipe['Type']?></td>
                <td><?=$recipe['Time']?>mn</td>
                <td><?=$recipe['NbServings']?></td>
                <td><?=$recipe['Difficulty']?></td>
                <td><?=$recipe['IdUser']?></td>
            </tr>
            <?php }
         } ?>
        </table>
    </section>