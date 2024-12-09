<?php



class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $products = $this->product->getAll();
        require_once('Views/products/index.php');
    }

    public function show($id) {
        $product = $this->product->getById($id);
        require_once('Views/products/show.php');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image = $this->uploadImage($_FILES['image']);

            if ($this->product->create($name, $description, $image, $price)) {
                header('Location: index.php');
                exit();
            }
        }
        require_once('Views/products/create.php');
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image = isset($_FILES['image']) ? $this->uploadImage($_FILES['image']) : null;

            if ($this->product->update($id, $name, $description, $image, $price)) {
                header('Location: index.php');
                exit();
            }
        }
        $product = $this->product->getById($id);
        require_once('Views/products/edit.php');
    }

    public function delete($id) {
        if ($this->product->delete($id)) {
            header('Location: index.php');
            exit();
        }
    }

    private function uploadImage($file) {
        $target_dir = "assets/images/";
        $fileName = uniqid() . '_' . basename($file['name']);
        $target_file = $target_dir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            return $fileName;
        }
        return false;
    }
}
