<?php

class Image{
    private $file;
    private $imageExtension;
    public function __construct(
        private $attri_name
    ){
        //echo "<script>alert(' $this->attri_name Image Does Not Exist');</script>";
        $this->file = $_FILES[$this->attri_name];
    }
    
    public function verifImage(int $taille,...$validImageExtension){
        //$validImageExtension=[];
        // Check if a file was uploaded
        if(!isset($this->file) || $this->file['error'] == UPLOAD_ERR_NO_FILE){
            // No file was uploaded
            return false;
        } else {
            // File was uploaded successfully
           
            $fileName = ($this->file)["name"];
            $fileSize = ($this->file)["size"];
    
           // $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
    
            // Check if the file extension is valid
            if (!in_array($imageExtension, $validImageExtension)) {
                return false;
            } else if ($fileSize > $taille) { // Check if file size is too large
                return false;
                // echo "<script>alert('Image Size Is Too Large');</script>";
            } else {
                // Generate a unique name for the image file
                
                $this->imageExtension = $imageExtension;
                return true;
            }
            
    }
    }
    function uploadImage($uploadDirectory){
            $newImageName = uniqid();
            $newImageName .= '.' . $this->imageExtension;
            $tmpName = $this->file["tmp_name"];
            // Specify the directory where you want to store uploaded images'img/recepie/'
            // Move the uploaded image file to its final destination with the new unique name
            if (move_uploaded_file($tmpName, $uploadDirectory . $newImageName)) {
                // Image successfully uploaded
                return $newImageName;
            } else {
                // Error occurred while uploading the image
                return false;
            }
    }

}

?>
