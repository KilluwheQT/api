<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class SalesModel extends Database
{
    public function getSales($limit)
    {
        return $this->select("SELECT * FROM details ORDER BY id ASC LIMIT ?", ["i", $limit]);
    } 
}