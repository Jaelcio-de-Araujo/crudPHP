<?php
// models/ContactModel.php

class ContactModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('sqlite:database.sqlite');
        $this->createTable();
    }

    private function createTable() {
        $this->db->exec("CREATE TABLE IF NOT EXISTS contacts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            email TEXT,
            phone TEXT
        )");
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)");
        $stmt->execute([$data['name'], $data['email'], $data['phone']]);
    }

    public function update($data) {
        $stmt = $this->db->prepare("UPDATE contacts SET name = ?, email = ?, phone = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['id']]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
    }
}
