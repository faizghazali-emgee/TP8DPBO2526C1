<?php
require_once 'models/Ruangan.php';

class RuanganController {
    private $model;

    public function __construct() {
        $this->model = new Ruangan();
    }

    public function index() {
        $data = $this->model->getAll();
        include 'template/header.php';
        include 'view/ruangan/index.php';
        include 'template/footer.php';
    }

    public function create() {
        include 'template/header.php';
        include 'view/ruangan/create.php';
        include 'template/footer.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert($_POST['kode_ruangan'], $_POST['nama_ruangan'], $_POST['penanggung_jawab']);
            header("Location: index.php?page=ruangan");
            exit;
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $row = $this->model->getById($id);
        include 'template/header.php';
        include 'view/ruangan/edit.php';
        include 'template/footer.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($_POST['id_ruangan'], $_POST['kode_ruangan'], $_POST['nama_ruangan'], $_POST['penanggung_jawab']);
            header("Location: index.php?page=ruangan");
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $berhasil = $this->model->delete($id);
            if ($berhasil) {
                header("Location: index.php?page=ruangan&status=deleted");
            } else {
                header("Location: index.php?page=ruangan&status=error_fk");
            }
            exit;
        }
    }
}