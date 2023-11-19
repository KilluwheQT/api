<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class CartModel extends Database
{
    public function getCart($limit)
    {
        return $this->select("SELECT * FROM cart ORDER BY id ASC LIMIT ?", ["i", $limit]);
    } 
    
}