<?php

class Products_model{
    private $table = "products";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllProducts(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getProductById($id){
        $this->db->query('SELECT * FROM '.$this->table .' WHERE product_id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addProduct($data){
        $query = "INSERT INTO products VALUES ('', :name, 3, :stock, :price, :description, '', NULL)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('description', $data['description']);
        $this->db->execute();
        
        return $this->db->row_count();
    }

    public function deleteProduct($id){
        $query = "DELETE FROM products WHERE product_id = :id";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->row_count();
    }

    public function updateProduct($data){
        $query = "UPDATE products SET name = :name, stock = :stock, price = :price, description = :description WHERE product_id = :id";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        
        return $this->db->row_count();
    }

    public function getProductByKeyword(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM products WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}