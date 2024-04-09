<?php
if(isset($_SESSION['messages'])){
   foreach($_SESSION['messages'] as $message){
      echo '<script>swal("'.$message['message'].'", "", "'.$message['type'].'");</script>';
   }
   unset($_SESSION['messages']); // Clear the messages after displaying them
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
