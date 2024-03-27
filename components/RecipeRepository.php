<?php 

    class RecipeRepository extends Repository {
        public function __construct() {
            parent::__construct("recipes");
        }
        public function updateAverageRating($rating,$recipeID) {
            $query = "update recipes set AverageRating = ? where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$rating,$recipeID]); 
        }
    }
    
?>