<?php 

    class favouriteRepository extends Repository {
        public function __construct() {
            parent::__construct("favoris");
        }
        public function findFavourite($userId){
            $query = "select * from  favoris where IdUser = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$userId]); 
            return $ps->fetchAll(PDO::FETCH_OBJ);   
        }

}