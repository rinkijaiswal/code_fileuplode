<?php
namespace App\Controllers;

class MultiUpload extends \CodeIgniter\Controller{
    
    public function __construct() {
        helper('form');
    }
    
    public function index(){
        $data=[];
        
        $rules = [
            'avatar'=>'uploaded[avatar.0]|max_size[avatar,1024]|is_image[avatar]'
        ];
        if($this->validate($rules))
        { 
            if($this->request->getMethod() == 'post'){
                $files = $this->request->getFiles();
                foreach($files['avatar'] as $img){
                    if($img->isValid() && !$img->hasMoved()){

                        if($img->move(FCPATH.'/uploads',$img->getRandomName())){
                            echo "File uploaded successfully";
                        }else{
                            echo $file->getErrorString()."".$file->getError();
                        }
                    }
                }
            }
        }else{
                $data['validation'] = $this->validator;
            }
        return view('multi_view',$data);
    }
}

?>