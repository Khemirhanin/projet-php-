<?php 

    class ReviewRepository extends Repository {
        public function __construct() {
            parent::__construct("reviews");
        }
        /**
         * Find a review for a specific user and recipe.
         * @param int $userId The ID of the user who submitted the review.
         * @param int $recipeID The ID of the reviewed recipe.
         * @return object|null The review object if found, or null if no review is found for the specified user and recipe.
         */
        public function findReview($userId, $recipeID) {
            $query = "select * from  reviews where User = ? and Recipe = ?;";
            $ps = $this->db->prepare($query);
            $ps->execute([$userId, $recipeID]); 
            return $ps->fetch(PDO::FETCH_OBJ);   
        }
        /**
         * Find reviews for a specific recipe.
         * @param int $recipeID The ID of the recipe for which reviews are to be retrieved.
         * @return array|null An array of review objects, or null if no reviews are found.
         */
        public function findReviewByRecipe($recipeID) {
            $query = "SELECT * FROM reviews WHERE Recipe = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$recipeID]); 
            return $ps->fetchAll(PDO::FETCH_OBJ);   
        }
        /**
         * Insert a new review into the database.
         * @param string $title The title of the review.
         * @param string $description The content of the review.
         * @param int $rate The rating given in the review from 1 to 5.
         * @param int $userId The ID of the user who submitted the review.
         * @param int $recipeID The ID of the recipe being reviewed.
         * @return void
         */
        public function insertReview($title, $description, $rate, $userId, $recipeID) {
            $query = "insert into reviews(Title, Description, Rate, User, Recipe) Values(?, ?, ?, ?, ?)";
            $ps = $this->db->prepare($query);
            $ps->execute([$title, $description, $rate, $userId, $recipeID]); 
        }
        /**
        * Update a review in the database.
        * @param string $title The new title of the review.
        * @param string $description The new content of the review.
        * @param int $rate The new rating given in the review from 1 to 5.
        * @param int $id The ID of the review to update.
        * @return void
        */ 
        public function updateReview($title, $Description, $Rate, $id){
            $query = "update reviews set Title = ?, Description = ?, Rate = ? where Id = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$title, $Description, $Rate,$id]);
        }
    }

?>