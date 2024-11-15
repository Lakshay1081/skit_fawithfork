<?php 
class categorycontrol extends Framwork {

    public function __construct() {
        if(!$this->getSession('adminSession')) {
            $this->redirect('signin');
        }
        $this->helpers("link");
        $this->CategoryModel = $this->model('CategoryModel');
        $this->AdminSession = $this->getSession('adminSession');
    }

    public function index() {
        $data['title'] = 'Categoies List | Sabjiwala';
        $data['view_cat_list'] = $this->CategoryModel->fetch_list_cat_data();
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/category-management/cat-list', $data);
        $this->view('dashboard/components/footer');
    }

    public function createcategory() {
        $data['title'] = 'Categories | Sabjiwala';
        $this->view('dashboard/components/header', $data);
        $this->view('dashboard/components/sidebar');
        $this->view('dashboard/panel/Category-management/create-cat', $data);
        $this->view('dashboard/components/footer');
    }

    public function addcategory() {
        $data = [
            'cat_name' => $this->input('cat_name'),
            'cat_des' => $this->input('cat_des'),
            'image' => $this->inputfiles('image')
        ];
        if(!empty($data['cat_name']) && !empty($data['cat_des']) && !empty($data['image'])) {
            $cat_token = $this->GenerateStringRendom(32);
            $uploadPath = DOCUMENT_ROOT."website-control/category-management/".trim($cat_token);
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
                    $result = $this->CategoryModel->add_cat_data($this->AdminSession, $cat_token, $data['cat_name'], $data['cat_des'], $data['image']);
                    $this->setFlash("success", "This category are added successfully");
                    $this->redirect('categorycontrol');
                }else{
                    $this->setFlash("error", "Sorry: some technical issue please try again");
                   $this->redirect('categorycontrol/createcategory');
                }
            }else {
                $this->setFlash("error", "Sorry: File type not supported");
                $this->redirect('categorycontrol/createcategory');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('categorycontrol/createcategory');
        }
    }


    public function categorypublished() {
        $data = [
            'cat_token' => $this->input('cat_token')
        ];
        if(!empty($data['cat_token'])) {
            if($this->CategoryModel->MatchcatToken($data['cat_token'])) {
                $result = $this->CategoryModel->catpublished($this->AdminSession, $data['cat_token']);
                $this->setFlash('success', 'This category are publiced successfully');
                $this->redirect('categorycontrol');
            }else {
                $this->setFlash('error', 'Sorry: Some technical issue please try again!');
            $this->redirect('categorycontrol');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('categorycontrol');
        }
    }

    public function categoryunpublished() {
        $data = [
            'cat_token' => $this->input('cat_token')
        ];
        if(!empty($data['cat_token'])) {
            if($this->CategoryModel->MatchcatToken($data['cat_token'])) {
                $result = $this->CategoryModel->catunpublished($this->AdminSession, $data['cat_token']);
                $this->setFlash('success', 'This category are unpubliced successfully');
                $this->redirect('categorycontrol');
            }else {
                $this->setFlash('error', 'Sorry: Some technical issue please try again!');
            $this->redirect('categorycontrol');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('categorycontrol');
        }
    }

    public function view_details() {
        $data=[
            'cat_token' => $this->input('cat_token')
        ];

        if (!empty($data['cat_token'])) {
            $data['cat_list'] = $this->CategoryModel->fetch_list_cat_details_data($data['cat_token']); 
            if ($data['cat_list']) {
                $data['title'] = 'View Category Details | Sabjiwala';
                $this->view('dashboard/components/header', $data);
                $this->view('dashboard/components/sidebar');
                $this->view('dashboard/panel/Category-management/view-cat-details', $data);
                $this->view('dashboard/components/footer');
            } else{
                $data['title'] = '404 Page';
                $this->view('page404', $data);
            }
        }else{
            $this->setFlash("error", "Sorry: Field is required please fill again");
            $this->redirect('categorycontrol');
        }
    }

    public function update_details() {
        $data = [
            'cat_token'=> $this->input('cat_token'),
            'cat_name' => $this->input('cat_name'),
            'cat_des' => $this->input('cat_des'),
            'image' => $this->inputfiles('image')
        ];

        if(!empty($data['cat_token'])) {
            if($this->CategoryModel->aviable_cat_data_in_table($data['cat_token'])) {
                if($data['image'] == ""){
                    $result = $this->CategoryModel->update_cat_details($this->adminSession, $data['cat_token'], $data['cat_name'],$data['cat_des'], $data['image']);
                    if($result) {
                       $this->setFlash("success", "Thanks: Your Data Successfully Update");
                       $this->redirect('categorycontrol'); 
                    }else {
                        $this->setFlash("error", "Sorry: technical issue please try again");
                        $this->redirect('categorycontrol');
                    }
                } else{
                    $uploadPath = DOCUMENT_ROOT."website-control/category-management/".trim($data['cat_token']);
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
                            $result = $this->CategoryModel->update_cat_details($this->adminSession, $data['cat_token'], $data['cat_name'], $data['cat_des'], $data['image']);
                            if($result) {
                               $this->setFlash("success", "Thanks: Your Data Successfully Update");
                               $this->redirect('categorycontrol'); 
                            }else {
                                $this->setFlash("error", "Sorry: technical issue please try again");
                                $this->redirect('categorycontrol');
                            }
                        }else{
                            $this->setFlash("error", "Sorry: some technical issue please try again");
                           $this->redirect('categorycontrol');
                        }
                    }else {
                        $this->setFlash("error", "Sorry: File type not supported");
                        $this->redirect('categorycontrol');
                    }
                }
            } else{
                $this->setFlash("error", "Sorry: technical issue please try again");
                $this->redirect('categorycontrol');
            }
        }else{
            $this->setFlash("error", "Sorry: Field is required please fill again");
            $this->redirect('categorycontrol');
        }
    }

    public function cat_delete() {
        $data=[
            'cat_token' => $this->input('cat_token')
        ];
        if(!empty($data['cat_token'])) {
            if($this->CategoryModel->MatchcatToken($data['cat_token'])) {
                $result = $this->CategoryModel->delete_cat_data($this->AdminSession, $data['cat_token']);
                $this->setFlash('success', 'This Category are deleted successfully');
                $this->redirect('categorycontrol');
            }else {
                $this->setFlash('error', 'Sorry: Some technical issue please try again!');
            $this->redirect('categorycontrol');
            }
        }else {
            $this->setFlash('error', 'Sorry: Field is required please fill again!');
            $this->redirect('categorycontrol');
        }
    }
}