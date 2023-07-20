<?php
namespace App\Models\Table;
use App\Models\Model;

class User extends Model{
    protected $login;
    protected $password;
    protected $age;
    protected $gender;
    
    public function __construct(){
        $this->table = 'users';
    }
}
?>