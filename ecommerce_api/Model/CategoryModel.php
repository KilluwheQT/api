<?php

class CategoryModel extends Database
{
    // public function getCategories($limit)
    // {
    //     return $this->select("SELECT * FROM category ORDER BY id ASC LIMIT ?", ["i", $limit]);
        
    // } 

    public function getAllCategories()
    {
        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM category");
		$stmt->execute();
		$row = $stmt->fetchAll();
		
		$pdo->close();
        return $row;

        
    } 
    

    public function getCategoryBySlug($slug){
        
        return $this->select("SELECT * FROM category WHERE cat_slug = ? ", ["s",$slug] );
        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();
		
		$pdo->close();
        return $row;
    }

    public function getCategoryById($id){
        
       //return $this->select("SELECT * FROM category WHERE id = ? ", ["s",$id] );

        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM category WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();
        return $row;
    }

    public function addCategory($name){
        
        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$data['error'] = 'Category already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO category (name) VALUES (:name)");
				$stmt->execute(['name'=>$name]);
				$data['success'] = 'Category added successfully';
			}
			catch(PDOException $e){
				$data['error'] = $e->getMessage();
			}
		}

		$pdo->close();
        return $data;
    }

    public function deleteCategory($id){
        
        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM category WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$data['success'] = 'Category deleted successfully';
		}
		catch(PDOException $e){
			$data['error'] = $e->getMessage();
		}

		$pdo->close();
        return $data;
    }

	public function editCategory($id,$name){
        
        $pdo = new DatabasePdo();
        $conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE category SET name=:name WHERE id=:id");
			$stmt->execute(['name'=>$name, 'id'=>$id]);
			$data['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$data['error'] = $e->getMessage();
		}
	

		$pdo->close();
        return $data;
    }

}