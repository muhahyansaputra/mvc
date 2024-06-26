<?php 

class Products extends Controller{
    public function index(){
        $data['title'] = "Products";
        $data['products'] = $this->model('Products_model')->getAllProducts();
        $this->view('templates/header', $data);
        $this->view('products/index', $data);
        $this->view('templates/footer');
    }

    public function info($id){
        $data['title'] = "Info Product";
        $data['products'] = $this->model('Products_model')->getProductById($id);
        $this->view('templates/header', $data);
        $this->view('products/info', $data);
        $this->view('templates/footer');
    }

    public function add(){
        if($this->model('Products_model')->addProduct($_POST)>0){
            Flasher::setFlash('Success', 'Add', 'success');
            header('Location: '.BASE_URL.'/products');
            exit;
        }else{
            Flasher::setFlash('Failed', 'Add', 'danger');
            header('Location: '.BASE_URL.'/products');
            exit;
        }
    }

    public function delete($id){
        if($this->model('Products_model')->deleteProduct($id)>0){
            Flasher::setFlash('Success', 'Delete', 'success');
            header('Location: '.BASE_URL.'/products');
            exit;
        }else{
            Flasher::setFlash('Failed', 'Delete', 'danger');
            header('Location: '.BASE_URL.'/products');
            exit;
        }
    }

    public function getDataForUpdate(){
        echo json_encode($this->model('Products_model')->getProductById($_POST['id']));
    }

    public function update(){
        if($this->model('Products_model')->updateProduct($_POST)>0){
            Flasher::setFlash('Success', 'Update', 'success');
            header('Location: '.BASE_URL.'/products');
            exit;
        }else{
            Flasher::setFlash('Failed', 'Update', 'danger');
            header('Location: '.BASE_URL.'/products');
            exit;
        }
    }

    public function search(){
        $data['title'] = "Products";
        $data['products'] = $this->model('Products_model')->getProductByKeyword();
        $this->view('templates/header', $data);
        $this->view('products/index', $data);
        $this->view('templates/footer');
    }

}