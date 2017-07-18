<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdInvestigador;

include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";


class InvestigadorController extends ControllerBase{
    public function indexAction(){
        $investigadores = CdInvestigador::find();
        $this->view->setVar("investigadores",$investigadores);
    }
    public function newAction(){
        $this->scripts();
    }
    public function editAction(){
        $inveid = $this->request->get("inveid");
        $investigador = CdInvestigador::findFirst($inveid);
        if($inveid && $investigador){
            $this->scripts();
            $this->view->setVar("inves",$investigador);
        }else{
            return $this->response->redirect("dashboard/notes");
        }
    }
    public function saveAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $investigador = new CdInvestigador();
            $investigador->setName(str_replace('\'', '"',$request->getPost("name")))
                ->setLastname($request->getPost("lastname"))
                ->setDescription($request->getPost("content"))
                ->setPermalink($request->getPost("permalink"))
                ->setPhoto($request->getPost("image"))
                ->setStatus($request->getPost("status"));
            if($investigador->save()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($investigador->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);
            }
        }else{
            $this->response(array("message"=>"No tienes permisos","code"=>404),404);
        }
    }
    public function updateAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $find = CdInvestigador::findFirst($request->getPost("inveid"));
            $find->setName(str_replace('\'', '"',$request->getPost("name")))
                ->setLastname($request->getPost("lastname"))
                ->setDescription($request->getPost("content"))
                ->setPhoto($request->getPost("image"))
                ->setStatus($request->getPost("status"));
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
    public function uploadImageAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/src/images/attorneys/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/src/images/attorneys/".$new_image);
                        $newImageThumbnail = $image_transform->resize(278,null)->crop(0,0,278,193);
                        $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/src/images/attorneys/200x200/".$new_image);
                        $newImageHeader = $image_transform->resize(500,null)->crop(0,0,500,608);
                        $newImageHeader->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/src/images/attorneys/263x320/".$new_image);
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
    public function validateUrlAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $post = new CdInvestigador();
            $name_post = $request->getPost("name");
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
    private function scripts(){
        $this->assets->collection('jsPlugins')
            ->setTargetPath("dash/js/general.investigador.min.js")
            ->setTargetUri("dash/js/general.investigador.min.js")
            ->addJs("dash/js/investigador/investigador.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}