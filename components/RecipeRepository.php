<?php 

    class RecipeRepository extends Repository {
        public function __construct() {
            parent::__construct("recipes");
        }
        /**
        * Rectrieve recipes sent by a user
        * @param int $id user id
        * @return array|null An array of recipe objects, or null if no recipes are found.
        */
        public function findByUserId($id) {
            $query = $this->db->prepare("SELECT * FROM recipes WHERE IdUser = :id");
            $query->execute(['id' => $id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        /**
         * Retrieve approved recipes from the database(confirm = 1)
         * @return array|null An array of approved recipe objects, or null if no approved recipes are found.
         */
        public function findApprovedRecipes(){
            $query = "select * from recipes where confirm is true";
            $response = $this->db->query($query);
            $recipes = $response->fetchAll(PDO::FETCH_OBJ);
            return $recipes;  
        }
         /**
         * Retrieve recipe requests from the database(confirm=0)
         * @return array|null An array of recipe request objects, or null if no requests are found.
         */
        public function findRequests(){
            $query = "select * from recipes where confirm is false";
            $response = $this->db->query($query);
            $recipes = $response->fetchAll(PDO::FETCH_OBJ);
            return $recipes;  
        }
        /**
         * Accept a recipe request and mark it as approved in the database.
         * @param int $recipeID The ID of the recipe to accept.
         * @return void
         */
        public function acceptRecipe($recipeID){
            $query = "update recipes set confirm = true where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
        }
        /**
         * Delete a recipe from the database.
         * @param int $recipeID The ID of the recipe to delete.
         * @return void
         */
        public function deleteRecipe($recipeID){
            $query = "delete from recipes where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
        }
    }

    
?>
