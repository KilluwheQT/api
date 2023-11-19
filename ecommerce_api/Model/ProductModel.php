<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class ProductModel extends Database
{
    // public function getProducts($limit)
    // {
    //     return $this->select("SELECT * FROM products ORDER BY id ASC LIMIT ?", ["i", $limit]);
    // }
    
    public function getProductsByCatId($catid){
        
        
        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM products WHERE category_id =:catid");
		$stmt->execute(['catid'=>$catid]);
		$row = $stmt->fetchAll();
		
		$pdo->close();
        return $row;

        //return $this->select("SELECT * FROM products WHERE category_id  = ? ", ["s",$catid] );
    }

    public function getProductBySlug($slug){

        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();
		
		$pdo->close();
        return $row;
        
       // return $this->select("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = ? ", ["s",$slug] );
    }

}