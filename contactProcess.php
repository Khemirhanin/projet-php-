<?php
  if(isset($_POST["send"])){
      $response = "Get in Touch";
      $name= $_POST["name"];
      $email= $_POST["email"];
      $subject= $_POST["subject"];
      $description= $_POST["description"];
      if(trim($name)!="" &&
      trim($email)!="" &&
      trim($subject)!="" &&
      trim($description)!=""
      ){
        $recipient= "benameureya953@gmail.com";
        $emailHeader = "From:".$name."<".$email.">\r\n";
        
        if(mail($recipient, $subject, $description, $emailHeader)){
            $response= "Email sent successfully";

        }
        else{
            $response= "Email sending failed";
        }
        

      }
      
      
      
  }header("Location:contact.php");
  echo $response;
?>