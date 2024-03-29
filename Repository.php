<?php 

abstract class Repository {
    protected $db = null; 
    public function __construct(protected $tableName) {
        $this->db = ConnexionBD::getInstance();
    }
    
    public function findAll() {
        $query = "select * from {$this->tableName}";
        $response = $this->db->query($query);
        $recipes = $response->fetchAll(PDO::FETCH_OBJ);
        return $recipes;
    }

    
    public function findById($id) {
        $query = "select * from  {$this->tableName} where Id = ?";
        $ps = $this->db->prepare($query);
        $ps->execute([$id]); 
        return $ps->fetch(PDO::FETCH_OBJ);
    }
    function insert($data) {
        $keys = array_keys($data);
        // ['name', 'age']
        $keysString = implode(',', $keys);
        $preparedParm =  implode(',', array_fill(0, count($keys), '?'));
        $req = "INSERT INTO {$this->tableName} (`id`, $keysString) VALUES (null, $preparedParm)";
        $reponse = $this->db->prepare($req);
        if ($reponse->execute(array_values($data))) {
            return true; // Return true if successful
        } else {
            return false; // Return false if there was an error
        }
    }

    
}