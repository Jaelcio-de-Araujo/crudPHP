<?php
// controllers/ContactController.php

require_once 'models/ContactModel.php';

class ContactController {
    private $model;

    public function __construct() {
        $this->model = new ContactModel();
    }

    public function index() {
        $contacts = $this->model->getAll();
        include 'views/index.php';
    }

    public function create() {
        include 'views/create.php';
    }

    public function store() {
        $this->model->insert($_POST);
        header('Location: /');
    }

    public function edit() {
        $contact = $this->model->get($_GET['id']);
        include 'views/edit.php';
    }

    public function update() {
        $this->model->update($_POST);
        header('Location: /');
    }

    public function delete() {
        $this->model->delete($_GET['id']);
        header('Location: /');
    }
}
