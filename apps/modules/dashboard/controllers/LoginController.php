<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdUser;
use Phalcon\Mvc\Controller;
class LoginController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        $this->assets->collection("functions")->addCss("dash/css/general.min.css");
        $this->view->setLayout('login');
    }
    public function indexAction()
    {
    }
    public function sessionAction(){
        if($this->validate() && $this->security->checkToken()){
            $request = $this->request;
            $user = new CdUser();
            $email      = $request->getPost("email");
            $password   = $request->getPost("password");
            $session = $user->findFirst("email='$email'");
            if(!$session){
                $this->response(array("message"=>"ERROR","code"=>400,"notification"=>"email incorrect"),200);
            }
            else if($session->getStatus()=="ACTIVE"){
                if($this->security->checkHash($password,$session->getPassword())){
                    $this->_registerSession($session);
                    $this->response(array("message"=>"SUCCESS","code"=>200,"url"=>$this->url->getBaseUri()."dashboard"),200);
                }
                else{
                    $this->response(array("message"=>"ERROR","code"=>300,"notification"=>"Password incorrect"),200);
                }
            }
        }
        else{
            $this->response(array("message"=>"ERROR","code"=>404,"notification"=>"Values Not found !!!"),404);
        }
    }
    public function _registerSession($user){
        $this->session->set("auth",array(
                "uid" => $user->getUid(),
                "username"=>$user->getUsername(),
                "rol"=>$user->getRol(),
                "name"=>$user->getName(),
                "photo"=>$user->getPhoto(),
                "email"=>$user->getEmail(),
                "cargo"=>$user->getCargo(),
            )
        );
    }
    public function logoutAction(){
        $this->session->remove("auth");
        $this->response->redirect("login");
        $this->flash->success('Goodbye!');
    }
    public function response($dataArray,$status)
    {
        $this->view->disable();
        if($status==200){
            $this->response->setStatusCode($status, "OK");
        }else{
            $this->response->setStatusCode($status, "ERROR");
        }
        $this->response->setJsonContent($dataArray);
        $this->response->send();
    }
    public function validate(){
        if($this->request->isPost() && $this->request->isAjax()){
            return true;
        }else{
            return false;
        }
    }
}
