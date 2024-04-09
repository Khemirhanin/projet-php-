<?php
require_once('components/autoload.php');
$userRepository=new userRepository();
$connectedUsers = $userRepository->findAll();    
?>
<section>
        <table class="table table-striped">
            
            <?php
            if(count($totalUsers)==0){
                echo "<h5>There are no registered users</h5>";
            }else{
                ?>
                <tr>
                    <th>Id</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
                <?php
                foreach($totalUsers as $user){
            ?>
            <tr>
                <td><?=$user->Id?></td>
                <td><?=$user->UserName?></td>
                <td><?=$user->Email?></td>
                <td><?= $user->Gender == 1 ? 'female' : 'male' ?></td>
            </tr>
            <?php }
         } ?>
        </table>
    </section>