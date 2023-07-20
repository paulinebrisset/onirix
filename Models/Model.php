<?php
namespace App\Models;
use App\Main\Database;
use PDO;


class Model extends Database{
    protected $table;
    // Instance de connexion
    private $db;
    public function executeRequest(string $sql, array $attributs = null){
        $this->db = Database::getInstance();
        if($attributs !== null){
            // Si attributs : requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // Requête simple. renvoie un booléen
            return $this->db->query($sql);
        }
    }
}
?>