<?php


class Product {
    private $conn;
    private $table = 'products';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($query);
        return $result;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function create($name, $description, $image, $price) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, description, image, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssd", $name, $description, $image, $price);
        return $stmt->execute();
    }

    public function update($id, $name, $description, $image, $price) {
        if($image) {
            $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, description = ?, image = ?, price = ? WHERE id = ?");
            $stmt->bind_param("sssdi", $name, $description, $image, $price, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, description = ?, price = ? WHERE id = ?");
            $stmt->bind_param("ssdi", $name, $description, $price, $id);
        }
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}