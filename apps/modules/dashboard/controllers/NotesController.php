<?php
namespace Modules\Dashboard\Controllers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";
use Modules\Models\Allnotes;
use Modules\Models\CdCategory;
use Modules\Models\CdPost;
use Modules\Models\CdSettingsPost;
use Modules\Models\CdSubcategory;
class NotesController extends ControllerBase{
    public function indexAction(){
        $auth = $this->auth();
        if($auth){
            $allNotes = Allnotes::find("name_category='Noticias'");
            $this->view->setVar("allnotes",$allNotes);
        }else{
            exit();
        }
    }
    public function conferenciasAction(){
        $allNotes = Allnotes::find("subcategoryname='Conferencias'");
        $this->view->setVar("allnotes",$allNotes);
    }
    public function diplomadosAction(){
        $allNotes = Allnotes::find("subcategoryname='Diplomados'");
        $this->view->setVar("allnotes",$allNotes);
    }
    public function forosAction(){
        $allNotes = Allnotes::find("subcategoryname='Foros'");
        $this->view->setVar("allnotes",$allNotes);
    }
    public function talleresAction(){
        $allNotes = Allnotes::find("subcategoryname='Talleres'");
        $this->view->setVar("allnotes",$allNotes);
    }
    public function seminariosAction(){
        $allNotes = Allnotes::find("subcategoryname='Seminarios'");
        $this->view->setVar("allnotes",$allNotes);
    }
    public function newNoteAction(){
        $auth = $this->auth();
        if($auth){
            $this->view->setVar("category",json_decode($this->getCategory(),true));
        }else{
            exit();
        }
    }
    public function editNoteAction(){
        $auth = $this->auth();
        $pid = $this->request->get("pid");
        $notes = new CdPost();
        if($auth && $pid && $notes->findFirst($pid)){
            $find = $notes->findFirst($pid);
            $subCategory = json_decode($this->getSubCategory(),true);
            foreach($subCategory as $key => $val){
                if($key==$find->getScid()){
                    $cat = $subCategory[$key];
                }
            }
            $this->view->setVar("categoryVal",key($cat));
            $this->view->setVar("category",json_decode($this->getCategory(),true));
            $this->view->setVar("subcategory",$subCategory);
            $this->view->setVar("note",$find);
        }else{
            return $this->response->redirect("dashboard/notes");
        }
    }
    public function newCursoAction(){
        $auth = $this->auth();
        if($auth){
            $category = CdCategory::find("name_category!='Noticias'");
            $this->view->setVar("category",$category);
        }else{
            exit();
        }
    }
    public function editCursoAction(){
        $auth = $this->auth();
        $pid = $this->request->get("pid");
        $notes = new CdPost();
        if($auth && $pid && $notes->findFirst($pid)){
            $find = $notes->findFirst($pid);
            $category = CdCategory::find("name_category!='Noticias'");
            $this->view->setVar("category",$category);
            $this->view->setVar("note",$find);
        }else{
            return $this->response->redirect("dashboard/notes");
        }
    }
    public function saveNoteAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
             $note = new CdPost();
             $note->setTitle(str_replace('\'', '"',$request->getPost("title")))
                 ->setImage($request->getPost("image"))
                 ->setPermalink($request->getPost("permalink"))
                 ->setSummary($request->getPost("summary"))
                 ->setContent($request->getPost("content"))
                 ->setStatus($request->getPost('status'))
                 ->setVisits(0)
                 ->setDateCreation(date('Y-m-d H:i:s'))
                 ->setDatePublic(date('Y-m-d H:i:s'))
                 ->setIsGallery(0)
                 ->setUid($auth['uid'])
                 ->setScid($request->getPost("subcategory"));
             if($note->save()){
                 $this->response(array("message"=>"SUCCESS","code"=>200),200);
             }else{
                 foreach ($note->getMessages() as $message) {
                     $this->flash->error((string) $message);
                 }
                 $this->response(array("message"=>"$message","code"=>404),200);             }
        }else{
           $this->response(array("message"=>"No tienes permisos","code"=>404),404);
        }
    }
    public function updateNoteAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth){
             $dateP = $request->getPost("dateP");
             $newDate = explode("/",$dateP);
             $newDate = $newDate["2"]."-".$newDate["1"]."-".$newDate["0"];
             $find = CdPost::findFirst($request->getPost("pid"));
             $find->setTitle(str_replace('\'', '"',$request->getPost("title")))
                 ->setImage($request->getPost("image"))
                 ->setPermalink($request->getPost("permalink"))
                 ->setSummary($request->getPost("summary"))
                 ->setContent($request->getPost("content"))
                 ->setStatus($request->getPost('status'))
                 ->setDateCreation(date('Y-m-d H:i:s'))
                 ->setDatePublic($newDate)
                 ->setIsGallery(0)
                 ->setUid($auth['uid'])
                 ->setScid($request->getPost("subcategory"));
             if($find->update()){
                 $this->response(array("message"=>"SUCCESS","code"=>200),200);
             }else{
                 foreach ($find->getMessages() as $message) {
                     $message = $this->flash->error((string) $message);
                 }
                 $this->response(array("message"=>"$message","code"=>404),200);             }
        }else{
            $this->response(array("message"=>"No tienes permisos","code"=>404),404);
        }
    }
    public function uploadImageNoteAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image);
                        $newImageThumbnail = $image_transform->resize(100,null)->crop(0,0,100,80);
                        $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/100x80/".$new_image);
                        $newImageHeader = $image_transform->resize(265,null)->crop(0,0,265,160);
                        $newImageHeader->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/265x160/".$new_image);
                        $newImageSlider1 = $image_transform->resize(819,null)->crop(0,0,819,452);
                        $newImageSlider1->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/819x452/".$new_image);
                        $newImageSlider2 = $image_transform->resize(350,null)->crop(0,0,350,150);
                        $newImageSlider2->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/350x150/".$new_image);
                        $newImageContentP = $image_transform->resize(560,null)->crop(0,0,560,390);
                        $newImageContentP->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/560x390/".$new_image);
                        $newImageCategory1 = $image_transform->resize(334,null)->crop(0,0,334,300);
                        $newImageCategory1->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/334x300/".$new_image);
                        $newImageCategory2 = $image_transform->resize(270,null)->crop(0,0,270,165);
                        $newImageCategory2->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/270x165/".$new_image);
                        $newImageFace = $image_transform->resize(800,null)->crop(0,0,800,600);
                        $newImageFace->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/800x600/".$new_image);
                        $newImageN = $image_transform->resize(1170,null);
                        $newImageN->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/1170/".$new_image);
                        $this->response(array("name"=>$new_image,"message"=>"SUCCESS","code"=>"200"),200);
                    }
                    else{
                        $this->response(array("name"=>$new_image,"message"=>"error try again","code"=>"404"),200);
                    }
                }
            }
        }else{
            exit();
        }
    }
    public function uploadMultipleImagesAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image);
                        $newImageThumbnail = $image_transform->resize(1024,null);
                        $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/1024/".$new_image);
                        echo $this->url->getBaseUri()."dash/img/notes/1024/"."$new_image";
                        exit();
                        //$this->response(array("name"=>$new_image,"message"=>"SUCCESS","code"=>"200"),200);
                    }
                    else{
                        $this->response(array("name"=>$new_image,"message"=>"error try again","code"=>"404"),200);
                    }
                }
            }
        }else{
            exit();
        }
    }
    public function categoryAction(){
        $request = $this->request;
        if($this->auth() && $request->isPost() && $request->isAjax()){
            $category_id = $request->getPost("category");
            $subCategory = json_decode($this->getSubCategory(),true);
            $scid = array();
            foreach($subCategory as $key => $value){
                foreach($subCategory[$key] as $k => $newValue){
                    if($k==$category_id){
                        $scid[$key] = $newValue;
                    }
                }
            }
            $this->response(array("message"=>"Success","code"=>"200","result"=>$scid),200);
        }else
        {$this->response(array("message"=>"error","code"=>"200"),200);}
    }
    public function validateUrlAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $post = new CdPost();
            $name_post = $request->getPost("title");
            $new_url = $this->url_clean($name_post);
            $check_url = $post->find("permalink = '$new_url'");
            $count = 1;
            while(count($check_url)){
                $generate_url = $new_url."-".$count;
                $check_url = $post->find("permalink = '$generate_url'");
                if(count($check_url)==0){
                    $new_url = $generate_url;
                }
                $count++;
            }
            $this->response(array("message"=>"SUCCESS","new_url"=>$new_url,"code"=>"200","data"=>"url generated"),200);
        }else{
            $this->response(array("message"=>"error"),200);
        }
    }
    private function url_clean($string) {
        $string = mb_strtolower(str_replace(' ', '-',str_replace('-','',$string)), 'UTF-8');
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-',
            '/:/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/!/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/¡/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/@/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/,/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚¿?]/u'    => '', // Literally a single quote
            '/[“”«»„""]/u'    => '', // Double quote
            '/ /'           =>   '', // nonbreaking space (equiv. to 0x160)
        );
        $string = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\-!¡¿?@]/', '', $string); // Removes special chars.
        return preg_replace(array_keys($utf8),array_values($utf8),$string); // Removes special chars.
        //'/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\-!¡¿?@]/', '',
    }
}