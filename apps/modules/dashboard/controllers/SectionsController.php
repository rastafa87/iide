<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdCategory;
use Modules\Models\CdSettingsPost;
use Modules\Models\Vsectionnotes;

class SectionsController extends ControllerBase
{
    public function indexAction(){
        if($this->auth()){
            $category = str_replace("-"," ",$this->request->get("category"));
            $ct = new CdCategory();
            if($ct->findFirst("name_category='$category'")){
                $post = new Vsectionnotes();
                $findNew = $post->findFirst("name_category='$category' and important='1'");
                $findNewSlider = $post->find("name_category='$category' and gallery='1' order by order_slider asc");
                $elements_slider = null;
                if(count($findNewSlider)>=1){
                    foreach($findNewSlider as $key => $values){
                        $elements_slider[$key+1] = array("pid"=>$values->getPid(),"title"=>$values->getTitle(),"order"=>$values->getOrderSlider());
                    }
                }
                $this->view->setVar("findNew",$findNew);
                $this->view->setVar("slider",$elements_slider);
                $this->view->setVar("category",$category);
            }
            else{$this->response->redirect("dashboard");}
        }else{
            $this->response->redirect("dashboard");
        }
    }
    public function homeAction(){
        if($this->auth()){
            $post = new Vsectionnotes();
            $findNew = $post->findFirst("home=1");
            $this->view->setVar("findNew",$findNew);
        }else{
            $this->response->redirect("dashboard");
        }
    }
    public function feedPostAction(){
        if($this->auth()){
            $word = $this->request->get("q");
            $category = $this->request->get("category");
            $type = $this->request->get("type");
            $pid = $this->request->get("pid");
            $note = new Vsectionnotes();
            if($type=="principal"){
                $find = $note->find("name_category='$category' and title like '$word%' and (gallery!=1 or gallery is null) ");
            }
            elseif($type=="slider"){
                if($pid){
                    $find = $note->find("name_category='$category' and title like '$word%' and pid!=$pid and (gallery!=1 or gallery is null)");
                }else{
                    $find = $note->find("name_category='$category' and title like '$word%' and (gallery!=1 or gallery is null)");
                }
            }elseif($type=="home"){
                $find = $note->find("title like '$word%' and (gallery!=1 or gallery is null)");
            }
            $content =array();
            foreach($find as $values){
                $content[$values->getPid()] = $values->getTitle();
            }
            $this->response($content,200);
        }else{
            exit;
        }
    }
    public function updateSectionAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($auth && $request->isAjax() && $request->isPost() && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            if($request->getPost("type")=="principal"){
                $pid = $request->getPost("principalNew");
                $principal_new = new CdSettingsPost();
                $pidLast = $request->getPost("pidLast");
                if($pidLast){
                    $find = $principal_new->findFirst("pid=$pidLast");
                    $find->setPid($pid);
                    $this->getResultSections($find,$find->update());
                }else{
                    $principal_new->setPid($pid)->setImportant(1)->setGallery(0)->setHeader(0)->setOrder(1);
                    $this->getResultSections($principal_new,$principal_new->save());
                }
            }elseif($request->getPost("type")=="slider"){
                $sliderV = $request->getPost("SliderNew");
                $pidLast = $request->getPost("pidLast");
                $orderSlider = new CdSettingsPost();
                if($pidLast[0]){
                    foreach($sliderV as $key => $values){
                        $find = $orderSlider->findFirst("pid=$pidLast[$key]");
                        $find->setPid($values);
                        $find->update();
                        $pid[$key+1]=$find->getPid();
                        $orderSlider = new CdSettingsPost();
                    }
                    $this->response(array("message"=>"SUCCESS","code"=>200,"pid"=>$pid),200);
                }else{
                    $pid = array();
                    foreach($sliderV as $key => $values){
                        $orderSlider->setPid($values)->setImportant(0)->setGallery(1)->setOrder($key+1);
                        $orderSlider->save();
                        $pid[$key+1]=$orderSlider->getPid();
                        $orderSlider = new CdSettingsPost();
                    }
                    $this->response(array("message"=>"SUCCESS","code"=>200,"pid"=>$pid),200);
                }
            }elseif($request->getPost("type")=="home"){
                $pid = $request->getPost("principalNew");
                $principal_new = new CdSettingsPost();
                $pidLast = $request->getPost("pidLast");
                if($pidLast){
                    $find = $principal_new->findFirst("pid=$pidLast and home=1");
                    $find->setPid($pid);
                    $this->getResultSections($find,$find->update());
                }else{
                    $principal_new->setPid($pid)->setImportant(0)->setGallery(0)->setHeader(0)->setOrder(0)->setHome(1);
                    $this->getResultSections($principal_new,$principal_new->save());
                }
            }
        }else{
            $this->response(array("message"=>"error"),404);
        }
    }
    public function getResultSections($object,$action){
        if($action){
            return $this->response(array("message"=>"SUCCESS","code"=>200,"pid"=>$object->getPid()),200);
        }else{
            foreach ($action->getMessages() as $key => $message) {
                $message[$key] = $this->flash->error((string) $message);
            }
            return $this->response(array("message"=>"$message","code"=>404),200);
        }
    }
}