<?php 

    class ReviewRepository extends Repository {
        public function __construct() {
            parent::__construct("reviews");
        }

        public function findReview($userId, $recipeID) {
            $query = "select * from  reviews where User = ? and Recipe = ?;";
            $ps = $this->db->prepare($query);
            $ps->execute([$userId, $recipeID]); 
            return $ps->fetch(PDO::FETCH_OBJ);   
        }
        public function findByRecipe($recipe) {
            $query = "select * from  reviews where Recipe = ?";
            $ps = $this->db->prepare($query);
            //exécute la requete
            $ps->execute([$recipe]); 
            return $ps->fetch(PDO::FETCH_OBJ);
        }       

        public function insertReview($title, $description, $rate, $userId, $recipeID) {
            $query = "insert into reviews(Title, Description, Rate, User, Recipe) Values(?, ?, ?, ?, ?)";
            $ps = $this->db->prepare($query);
            $ps->execute([$title, $description, $rate, $userId, $recipeID]); 
            $this->updateAverageRating($recipeID);

        }
        public function updateReview($title, $Description, $Rate, $id, $recipeID){
            $query = "update reviews set Title = ?, Description = ?, Rate = ? where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$title, $Description, $Rate,$id]);
            $this->updateAverageRating($recipeID);
        }
        public function updateAverageRating($recipeID){
            $query = "select avg(rate) as rating from  reviews where Recipe = ?;";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
            $avgRating = (float)$ps->fetch(PDO::FETCH_OBJ)->rating;
            $recipeRepository = new RecipeRepository(); 
            $recipeRepository->updateAverageRating($avgRating, $recipeID);
        }
    }
    
?>