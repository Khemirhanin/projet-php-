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
        public function findApprovedRecipes(){
            $query = "select * from recipes where confirm is true";
            $response = $this->db->query($query);
            $recipes = $response->fetchAll(PDO::FETCH_OBJ);
            return $recipes;  
        }
        public function findRequests(){
            $query = "select * from recipes where confirm is false";
            $response = $this->db->query($query);
            $recipes = $response->fetchAll(PDO::FETCH_OBJ);
            return $recipes;  
        }
        public function acceptRecipe($recipeID){
            $query = "update recipes set confirm = true where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
        }
        public function deleteRecipe($recipeID){
            $query = "delete from recipes where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
        }
    }
    
?>