<?php 

    class ReviewRepository extends Repository {
        public function __construct() {
            parent::__construct("reviews");
        }
        // Find a record by its ID
        public function findReview($userId, $recipeID) {
            $query = "select * from  reviews where User = ? and Recipe = ?;";
            $ps = $this->db->prepare($query);
            $ps->execute([$userId, $recipeID]); 
            return $ps->fetch(PDO::FETCH_OBJ);   
        }
        //find all reviews related to a recipe
        public function findReviewByRecipe($recipeID) {
            $query = "SELECT * FROM reviews WHERE Recipe = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
            return $ps->fetchAll(PDO::FETCH_OBJ);   
        }
       //insert a new review
        public function insertReview($title, $description, $rate, $userId, $recipeID) {
            $query = "insert into reviews(Title, Description, Rate, User, Recipe) Values(?, ?, ?, ?, ?)";
            $ps = $this->db->prepare($query);
            $ps->execute([$title, $description, $rate, $userId, $recipeID]); 
        }
        //update a review
        public function updateReview($title, $Description, $Rate, $id){
            $query = "update reviews set Title = ?, Description = ?, Rate = ? where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$title, $Description, $Rate,$id]);       
        }
    }

?>