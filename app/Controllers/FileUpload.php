<?php


namespace App\Controllers;

// $file->isValid() - ye check krta hai ki file valid hai ya ni
// $file->hasMoved() - ye check krta hai ki file move hui hmare pas ya ni
// $file->getRandomName() - ye hmari file ko koi bhi random name dedega
// $file->move(WRITEPATH/FCPATH.'uploads/',$newName)
// WRITEPATH - file dal dega writable folder me
// FCPATH - file dal dega public folder me

class FileUpload extends \CodeIgniter\Controller{
    
    public function __construct(){
        helper('form');
    }
    
    public function index(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $rules = [
                'avatar'=>'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,jpg,png,gif]'
            ];
            if($this->validate($rules))
            { 
                $file = $this->request->getFile('avatar');
//                $newName = $file->getRandomName();
//                if($file->move(FCPATH.'/uploads/',$newName)){
//                    echo "moved successfully";
//                }else{
//                    echo "error";
//                }
//                echo "<pre>";
//                print_r($file);
//                echo "</pre>";
                if($file->isValid() && !$file->hasMoved()){
                    $newName = $file->getRandomName();
                    if($file->move(WRITEPATH.'/uploads',$newName)){
                        echo "File uploaded successfully";
                    }else{
                        echo $file->getErrorString()."".$file->getError();
                    }
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }
        
        return view('upload_view',$data);
    }
}
