<?php
class productcontrol extends Framwork {

    public function __construct() {
        if(!$this->getSession('adminSession')) {
            $this->redirect('signin');
        }
        $this->helpers("link");
        $this->ProductModel = $this->model('ProductModel');
        $this->AdminSession = $this->getSession('adminSession');
    }

    public function index() {
        $data['title'] = 'Product List | Sabjiwala';
        $data['product_manage'] = $this->ProductModel->fetch_list_product_data($this->AdminSession);
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/Product-management/product-list', $data);
        $this->view('dashboard/components/footer');
    }

    public function createproduct() {
        $data['title'] = 'Add Product | Sabjiwala';
        $data['category_manage'] = $this->ProductModel->fetch_list_category_data($this->AdminSession);
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/Product-management/create-product', $data);
        $this->view('dashboard/components/footer');
    }

    public function addproduct() {
        $data = [
            'product_category' => $this->input('product_category'),
            'product_name' => $this->input('product_name'),
            'cost_price' => $this->input('cost_price'),
            'discount_price' => $this->input('discount_price'),
            'product_unit' => $this->input('product_unit'),
            'image' => $this->inputfiles('image'),
            'description' => $this->input('description'),
        ];

        if(!empty($data['product_category']) && !empty($data['product_name']) && !empty($data['discount_price']) && !empty($data['product_unit']) && !empty($data['image']) && !empty($data['description'])) {
            if($data['discount_price'] == 'na'){
                $discount_price = 0;
            } else{
                $discount_price = $data['discount_price'];
            }
            $product_token = $this->GenerateStringRendom(32);
            $uploadPath = DOCUMENT_ROOT."website-control/product-management/".trim($product_token);
            if(!is_dir($uploadPath)){
                mkdir($uploadPath, 0755, true);
            }
            $uploadPath .= "/";
            $FileName = basename($_FILES["image"]["name"]);
            $fileUpload = $uploadPath . $FileName;
            $fileType = pathinfo($fileUpload, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','jpeg','gif', 'png');
            $DocFile = $_FILES["image"]["tmp_name"];
            if(in_array($fileType, $allowTypes)) { 
                $compressedImage = $this->compressImage($DocFile, $fileUpload,75);
                if($compressedImage){
                    $add_discount_price = $data['cost_price'] - (($data['cost_price'] * $discount_price) / 100);
                    $selling_price = $add_discount_price;
                    $result = $this->ProductModel->add_product_data($this->AdminSession, $product_token, $data['product_category'], $data['product_name'], $add_discount_price, $selling_price, $data['cost_price'], $discount_price, $data['product_unit'], $data['image'], $data['description']);
                    $this->setFlash("success", "This product are added successfully");
                    $this->redirect('productcontrol');
                }else{
                    $this->setFlash("error", "Sorry: some technical issue please try again");
                   $this->redirect('productcontrol/createproduct');
                }
            }else {
                $this->setFlash("error", "Sorry: File type not supported");
                $this->redirect('productcontrol/createproduct');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('productcontrol/createproduct');
        }
    }

    public function productpublished() {
        $data = [
            'product_token' => $this->input('product_token')
        ];

        if(!empty($data['product_token'])) {
            if($this->ProductModel->MatchproductToken($data['product_token'])) {
                $result = $this->ProductModel->productpublished($this->AdminSession, $data['product_token']);
                $this->setFlash('success', 'This product are published successfully');
                $this->redirect('productcontrol');
            }else {
                $this->setFlash('error', 'Sorry: Some technical issue please try again!');
                $this->redirect('productcontrol');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('productcontrol');
        }
    }

    public function productunpublished() {
        $data = [
            'product_token' => $this->input('product_token')
        ];
        if(!empty($data['product_token'])) {
            if($this->ProductModel->MatchproductToken($data['product_token'])) {
                $result = $this->ProductModel->productunpublished($this->AdminSession, $data['product_token']);
                $this->setFlash('success', 'This product are unpublished successfully');
                $this->redirect('productcontrol');
            }else {
                $this->setFlash('error', 'Sorry: Some technical issue please try again!');
            $this->redirect('productcontrol');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('productcontrol');
        }
    }

    public function product_delete() {
        $data=[
            'product_token' => $this->input('product_token')
        ];
        if(!empty($data['product_token'])) {
            if($this->ProductModel->MatchproductToken($data['product_token'])) {
                $result = $this->ProductModel->delete_product_data($this->AdminSession, $data['product_token']);
                $this->setFlash('success', 'This product are deleted successfully');
                $this->redirect('productcontrol');
            }else {
                $this->setFlash('error', 'Sorry: Some technical issue please try again!');
            $this->redirect('productcontrol');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('productcontrol');
        }
    }

    public function view_details() {
        $data=[
            'product_token' => $this->input('product_token')
        ];
        if (!empty($data['product_token'])) {
            $data['product_view'] = $this->ProductModel->fetch_list_product_details_data($this->AdminSession, $data['product_token']);
            if ($data['product_view']) {
                $data['title'] = 'View Product Details | Sabjiwala';
                $this->view('dashboard/components/header', $data);
                $this->view('dashboard/components/sidebar');
                $this->view('dashboard/panel/Product-management/view-product-details', $data);
                $this->view('dashboard/components/footer');
            } else{
                $data['title'] = '404 Page';
                $this->view('page404', $data);
            }
        }else{
            $this->setFlash("error", "Sorry: Field is required please fill again");
            $this->redirect('productcontrol');
        }
    } 

    public function GetCategoryDetails($cat_token)  {
        return $this->ProductModel->fatch_list_category_details($this->AdminSession, $cat_token);
    }

     public function update_details() {
        $data = [
            'product_token'=> $this->input('product_token'),
            'product_name' => $this->input('product_name'),
            'cost_price' => $this->input('cost_price'),
            'discount_price' => $this->input('discount_per'),
            'product_unit' => $this->input('product_unit'),
            'image' => $this->inputfiles('image'),
            'description' => $this->input('description'),
        ];

        if(!empty($data['product_token'])) {
            if($this->ProductModel->aviable_product_data_in_table($data['product_token'])) {
                if($data['image'] == ""){
                    $result = $this->ProductModel->update_product_without_image_details($this->AdminSession, $data['product_token'], $data['product_name'], $data['cost_price'], $data['discount_price'], $data['product_unit'], $data['description']);
                    if($result) {
                       $this->setFlash("success", "Thanks: Your Data Successfully Update");
                       $this->redirect('productcontrol'); 
                    }else {
                        $this->setFlash("error", "Sorry: technical issue please try again");
                        $this->redirect('productcontrol');
                    }
                } else{
                    $uploadPath = DOCUMENT_ROOT."website-control/product-management/".trim($data['product_token']);
                    if(!is_dir($uploadPath)){
                        mkdir($uploadPath, 0755, true);
                    }
                    $uploadPath .= "/";
                    $FileName = basename($_FILES["image"]["name"]);
                    $fileUpload = $uploadPath . $FileName;
                    $fileType = pathinfo($fileUpload, PATHINFO_EXTENSION);
                    $allowTypes = array('jpg','jpeg','gif', 'png');
                    $DocFile = $_FILES["image"]["tmp_name"];
                    if(in_array($fileType, $allowTypes)) { 
                        $compressedImage = $this->compressImage($DocFile, $fileUpload,75);
                        if($compressedImage){
                             $result = $this->ProductModel->update_product_details($this->AdminSession, $data['product_token'], $data['product_name'], $data['cost_price'], $data['discount_price'], $data['tax'], $data['image'], $data['description']);
                            if($result) {
                               $this->setFlash("success", "Thanks: Your Data Successfully Update");
                               $this->redirect('productcontrol'); 
                            }else {
                                $this->setFlash("error", "Sorry: technical issue please try again");
                                $this->redirect('productcontrol');
                            }
                        }else{
                            $this->setFlash("error", "Sorry: some technical issue please try again");
                           $this->redirect('productcontrol');
                        }
                    }else {
                        $this->setFlash("error", "Sorry: File type not supported");
                        $this->redirect('productcontrol');
                    }
                }
            } else{
                $this->setFlash("error", "Sorry: technical issue please try again");
                $this->redirect('productcontrol');
            }
        }else{
            $this->setFlash("error", "Sorry: Field is required please fill again");
            $this->redirect('productcontrol');
        }
    }
}