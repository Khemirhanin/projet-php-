<?php 

    class RecipeRepository extends Repository {
        public function __construct() {
            parent::__construct("recipes");
        }
        public function findByUserId($id) {
            $query = $this->db->prepare("SELECT * FROM recipes WHERE IdUser = :id");
            $query->execute(['id' => $id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        //find recipes that have been approved by the admin (confirm=1)
        public function findApprovedRecipes(){
            $query = "select * from recipes where confirm is true";
            $response = $this->db->query($query);
            $recipes = $response->fetchAll(PDO::FETCH_OBJ);
            return $recipes;  
        }
        //find recipes that have not been approved by the admin (confirm=0)
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