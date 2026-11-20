<?php
require_once 'models/Aset.php';
require_once 'models/Ruangan.php';

class AsetController {
    private $asetModel;
    private $ruanganModel;

    public function __construct() {
        $this->asetModel = new Aset();
        $this->ruanganModel = new Ruangan();
    }

    public function index() {
        $data = $this->asetModel->getAll();
        include 'template/header.php';
        include 'view/aset/index.php';
        include 'template/footer.php';
    }

    public function create() {
        $ruanganList = $this->ruanganModel->getAll();
        include 'template/header.php';
        include 'view/aset/create.php';
        include 'template/footer.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->asetModel->insert(
                $_POST['kode_aset'], $_POST['nama_aset'], $_POST['kondisi'],
                $_POST['jumlah'], $_POST['tanggal_masuk'], $_POST['id_ruangan']
            );
            header("Location: index.php?page=aset");
            exit;
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $row = $this->asetModel->getById($id);
        $ruanganList = $this->ruanganModel->getAll();
        include 'template/header.php';
        include 'view/aset/edit.php';
        include 'template/footer.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->asetModel->update(
                $_POST['id_aset'], $_POST['kode_aset'], $_POST['nama_aset'],
                $_POST['kondisi'], $_POST['jumlah'], $_POST['tanggal_masuk'], $_POST['id_ruangan']
            );
            header("Location: index.php?page=aset");
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->asetModel->delete($id);
            header("Location: index.php?page=aset&status=deleted");
            exit;
        }
    }
}