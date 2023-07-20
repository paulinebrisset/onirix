<?php
/**** Lien tuto : https://nouvelle-techno.fr/articles/live-coding-php-oriente-objet-base-de-donnees ***/
namespace App\Main;
use PDO; //on met ça pour que à chaque "PDO" qui cherche la classe à la racine, et pas dans le namespace qu'on vient de définir. 
use PDOException;

class Database extends PDO{
// Design patern "singloton"

    // instance unique pour cette classe, retournée par Database::getinstance()
    private static $instance;

    // Informations de connexion
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'onirix';
    private const DBCHARSET = 'utf8';
    
    private function __construct(){
        // Chaîne de connexion
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST . ';charset='. self::DBCHARSET;
        // Constructeur de la classe PDO
        try{
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            //$this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8_general_ci');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);//fetch ou un fetchAll --> tableau associatif
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //récupérer les erreurs
        
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // Renvoie l'instance
    public static function getInstance():self {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}
?>