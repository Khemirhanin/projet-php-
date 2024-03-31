<?php

$con=mysqli_connect("localhost","root","","foodHub");
?>
<section>
        <table class="table table-striped">
            
            <?php
            
            //Get the connected users
                $connectedUsers = mysqli_query($con," SELECT * from users where Status = 1");                
            
            if(mysqli_num_rows($connectedUsers)==0){
                echo "<h5>There are no connected users at the moment</h5>";
            }else{
                ?>
                <tr>
                    <th>Id</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>NbPosts</th>
                </tr>
                <?php 
                foreach($connectedUsers as $user){
            ?>
            <tr>
                <td><?=$user['Id']?></td>
                <td><?=$user['UserName']?></td>
                <td><?=$user['Email']?></td>
                <td><?=$user['Gender']?></td>
                <td><?=$user['nbPost']?></td>
            </tr>
            <?php }
         } ?>
        </table>
    </section>