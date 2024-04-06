<?php

$con=mysqli_connect("localhost","root","","foodHub");
?>
<section>
        <table class="table table-striped">
            
            <?php
            
            //Get the connected users
                $totalRequests = mysqli_query($con," SELECT * from recipes where IdUser <> 0 ");                
            
            if(mysqli_num_rows($totalRequests)==0){
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
                <td><?=$request['Id']?></td>
                <td><img  class="recipeImg" src="img/recepie/<?=$request['Image']?>" alt="<?=$recipe['Image']?></"></td>
                <td><?=$request['Name']?></td>
                <td><?=$request['Type']?></td>
                <td><?=$request['Time']?>mn</td>
                <td><?=$request['NbServings']?></td>
                <td><?=$request['Difficulty']?></td>
                <td><?=$request['IdUser']?></td>
            </tr>
            <?php }
         } ?>
        </table>
    </section>