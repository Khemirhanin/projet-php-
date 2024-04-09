<?php 

    class userRepository extends Repository {
        public function __construct() {
            parent::__construct("users");
        }
        // Find a record by its email
        public function findByEmail($email) {
            $query = "select * from  {$this->tableName} where Email = ?";
            $ps = $this->db->prepare($query);
            $ps->execute([$email]); 
            return $ps->fetch(PDO::FETCH_OBJ);
        }
        // Find connected users (the ones wgere status =1)
        public function findConnectedUsers()
        {
            $query = "select * from  {$this->tableName} where Status = 1";
            $ps = $this->db->prepare($query);
            $ps->execute(); 
            return $ps->fetchAll(PDO::FETCH_OBJ);
        }
        //update user information
        public function updateUser($data) {
            $keys = array_keys($data);
            $keysString = implode('=?, ', $keys); // Adjusted to include placeholders for each key
            $keysString .= '=?'; // Adding the last placeholder
            $req = "UPDATE {$this->tableName} SET $keysString WHERE Id = ?";
            $reponse = $this->db->prepare($req);
            $values = array_values($data);
            $values[] = $data['Id']; // Adding the Id value at the end for WHERE clause
            $reponse->execute($values);
            if ($reponse->rowCount() > 0) {
                return true; // Return true if successful
            } else {
                return false; // Return false if there was an error
            }
        }
        


    }
    
    
?>