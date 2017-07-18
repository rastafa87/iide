<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdCategoryLaw;
use Modules\Models\CdCountry;
use Modules\Models\CdLaw;

class SystemController extends ControllerBase
{
    public function indexAction()
    {
        $auth = $this->auth();
        if($auth){
            $allCountry = new CdCountry();
            $this->view->setVar("allcountry",$allCountry->find());
        }else{
            exit();
        }
    }
    public function newAction(){
        $auth = $this->auth();
        $coid = $this->request->get("coid");
        if($auth){
            $this->scripts();
            $categoryLaw = new CdCategoryLaw();
            $this->view->setVar("country",$coid);
            $this->view->setVar("category",$categoryLaw->find());
        }else{
            exit();
        }
    }
    public function editAction()
    {
        $auth = $this->auth();
        $coid = $this->request->get("coid");
        $law = new CdLaw();
        if($auth && $coid){
            $this->scripts();
            $country = new CdCountry();
            $this->view->setVar("alllaw",$law->find("coid=$coid"));
            $this->view->setVar("country",$country->findFirst("coid=$coid"));
        }else{
            exit();
        }
    }
    public function editlawAction()
    {
        $auth = $this->auth();
        $laid = $this->request->get("laid");
        $coid = $this->request->get("coid");
        $law = new CdLaw();
        if($auth && $laid){
            $this->scripts();
            $categoryLaw = new CdCategoryLaw();
            $country = new CdCountry();
            /*$this->view->setVar("categorylaw",json_decode($this->getCategoryLaw(),true));*/
            $this->view->setVar("law",$law->findFirst("laid=$laid"));
            $this->view->setVar("country",$country->findFirst("coid=$coid"));
            $this->view->setVar("countryall",$country->find());
            $this->view->setVar("category",$categoryLaw->find());
        }else{
            exit();
        }
    }
    public function savelawAction()
    {
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $this->scripts();
            $law = new CdLaw();
            $law->setLaw($request->getPost("name"))
                ->setFile($request->getPost("files"))
                ->setCoid($request->getPost("country"))
                ->setClid($request->getPost("category"));
            if($law->save()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($law->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);             }
        }else{
            $this->response(array("message"=>"No tienes permisos","code"=>404),404);
        }
    }
    public function uploadFileAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $new_image =$file->getName();
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/api/".$new_image)){

                        $this->response(array("name"=>$new_image,"message"=>"El archivo se ha guardado correctamente","code"=>"200"),200);
                    }
                    else{
                        $this->response(array("name"=>$new_image,"message"=>"El archivo no se ha podido guardar, intente nuevamente","code"=>"404"),200);
                    }
                }
            }
        }else{
            $this->response(array("message"=>"Error 404, try again."),404);
        }
    }
    public function deletedFileAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $auth){
            $name = $request->getPost("name");
            $id = $request->getPost("laid");
            try{
                unlink(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/api/".$name);
                $cd_post = CdLaw::findFirst($id);
                $cd_post->setFile("");
                if(!$cd_post->update())$this->response(array("message"=>"El archivo no se ha borrado en la base de datos, intenta nuevamente","code"=>"300"),200);
            }catch (\Exception $e){
                $this->response(array("message"=>"El archivo no se ha borrado correctamente","code"=>"300"),200);
            }
            $this->response(array("message"=>"El archivo se ha borrado correctamente","code"=>"200"),200);
        }else{
            $this->response(array("message"=>"Error 404, try again."),404);
        }
    }
    public function updateAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($auth && $request->isAjax() && $request->isPost()){
            $values = $request->getPost();
            $law = CdLaw::findFirst($values['laid']);

            if(!$law)$this->response(array("message"=>"No se ha encontrado este post en la base de datos, recargue por favor","code"=>300),200);
            $law->setLaw($values['name'])
                ->setFile($values['files'])
                ->setCoid($values['country'])
                ->setClid($values['category']);
            if(!$law->update())$this->response(array("message"=>"No se ha podido guardar la información","code"=>300),200);
            $this->response(array("message"=>"Datos guardados correctamente","content"=>$request->getPost(),"code"=>200),200);
        }else{
            $this->response(array("message"=>"error"),404);
        }
    }
    public function deleteAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($auth && $request->isPost() && $request->isAjax()){
            $id = $request->getPost("id");
            $find = CdLaw::findFirst($id);
            if($find->delete())$this->response(array("code"=>"200","message"=>"SUCCESS"),200);
            $this->response(array("code"=>"404","message"=>"Error to update cd_products"),200);
        }else{
            $this->response(array("code"=>404,"message"=>"You do not have permission"),404);
        }
    }
    private function scripts(){
        $this->assets->collection('jsPlugins')
            ->setTargetPath("dash/js/general.post.min.js")
            ->setTargetUri("dash/js/general.post.min.js")
            ->addJs("dash/js/plugins/dropzone/dropzone.min.js")
            ->addJs("dash/js/plugins/tableDnD/jquery.tablednd.js")
            ->addJs("dash/js/custom.upload.files.js")
            ->addJs("dash/js/system/system.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}