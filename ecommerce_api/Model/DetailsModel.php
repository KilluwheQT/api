<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class DetailsModel extends Database
{
    public function getDetails($limit)
    {
        return $this->select("SELECT * FROM details ORDER BY id ASC LIMIT ?", ["i", $limit]);
    } 
}