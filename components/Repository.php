<?php 

abstract class Repository {
    protected $db = null;
    public function __construct(private $tableName) {
        $this->db = ConnexionBD::getInstance();
    }
    
    public function findAll() {
        $query = "select * from {$this->tableName}";
        $response = $this->db->query($query);
        $recipes = $response->fetchAll(PDO::FETCH_OBJ);
        return $recipes;
    }

    
    public function findById($id) {
        $query = "select * from  {$this->tableName} where id = ?";
        $ps = $this->db->prepare($query);
        //exécute la requete
        $ps->execute([$id]); 
        return $ps->fetch(PDO::FETCH_OBJ);
    }
} 