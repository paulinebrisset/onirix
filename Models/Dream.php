<?php
namespace App\Models\Table;
use App\Models\Model;

class Dream extends Model{
    protected $user_id;
    protected $theme;
    protected $sentiment;
    protected $dream_date;
    
    public function __construct(){
        $this->table = 'dreams';
    }
    //Caution transform string into date ? 
    public function setDream(string $theme, string $sentiment, string $dream_date):self{
        $this->theme = $theme;
        $this->sentiment = $sentiment;
        $this->dream_date = date($dream_date);
        return $this;
    }
}
?>