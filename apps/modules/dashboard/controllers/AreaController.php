<?php
namespace Modules\Dashboard\Controllers;

use Modules\Models\CdArea;

class AreaController extends ControllerBase
{
    public function indexAction()
    {
        $area = CdArea::find();

        $this->view->setVar("area",$area);
    }
    public function newAction()
    {
    }
    public function saveAction()
    {
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $note = new CdArea();
            $note->setName($request->getPost("name"))
                ->setIcon($request->getPost("icon"))
                ->setStatus($request->getPost('status'));
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
    public function editAction()
    {
        $areid = $this->request->get("areid");
        $area = CdArea::findFirst($areid);

        $this->view->setVar("area",$area);
    }
    public function updateAction()
    {
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $find = CdArea::findFirst($request->getPost("areid"));
            $find->setName($request->getPost("name"))
                ->setIcon($request->getPost("icon"))
                ->setStatus($request->getPost('status'));
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
}