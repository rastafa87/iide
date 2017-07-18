<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdPost;
use Modules\Models\CdSocialMedia;
use Modules\Models\CdUser;
use Modules\Models\Vusers;

include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";

class UserController extends ControllerBase
{
    public function indexAction()
    {
        $users = CdUser::find("status='ACTIVE'");
        $this->view->setVar("users",$users);
    }
    public function newUserAction(){}
    public function editAction(){
        $auth = $this->auth();
        if($auth){
            $uid = $this->dispatcher->getParam("uid");
            $find = Vusers::findFirst("uid = $uid");
            $this->view->setVar("user",$find);
            $this->view->setVar("auth",$auth);
        }else{
            return $this->response->redirect();
        }
    }
    public function saveUserAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isAjax() && $request->isPost() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $user = new CdUser();
            $find = $user;
            $usnm = str_replace(" ","-",$request->getPost("username"));
            $find->setName($request->getPost("name"))
                ->setLastName($request->getPost("last_name"))
                ->setSecondName($request->getPost("second_name"))
                ->setSex($request->getPost("sex"))
                ->setPhone($request->getPost("phone"))
                ->setUsername($usnm)
                ->setEmail($request->getPost("email"))
                ->setPhoto("no-image.jpg")
                ->setPassword($this->security->hash($request->getPost("password")))
                ->setCargo($request->getPost("cargo"))
                ->setRol($request->getPost('rol'))
                ->setStatus($request->getPost('status'));
            if($find->save()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($find->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);
            }
        }else{
            return $this->response->redirect();
        }
    }
    public function socialMediaAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isAjax() && $request->isPost() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $uid = $request->getPost("uid");
            $sm = new CdSocialMedia();
            $find = $sm->findFirst("uid=$uid");
            $find->setFacebook($request->getPost("facebook"))
                ->setTwitter($request->getPost("twitter"))
                ->setGooglePlus($request->getPost("google"))
                ->setInstagram($request->getPost("instagram"))
                ->setPinterest($request->getPost("pinterest"))
                ->setYoutube($request->getPost("youtube"));

            if($find->update()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($find->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);
            }
        }else{
            return $this->response->redirect();
            exit();
        }
    }
    public function searchProfileAction(){
        $username = $this->dispatcher->getParam("username");
        $auth = $this->session->get("auth");
        $type = $this->dispatcher->getParam("type");
        $user_session = "";
        if($auth){
            $user_session = $auth['username'];
        }
        if($type=="search"){
            $donor = new VDonors();
            $find = $donor->findFirst("username='$username' and donor=1");
            if(!$find or $find->getUsername()==="$user_session"){
                if($user_session!=""){
                    return $this->response->redirect("usuario/mi-perfil/$user_session");
                }else{
                    return $this->response->redirect();
                }

            }
            $cd_donors = new CdDonors();
            $uid  = $find->getUid();
            $find_cd = $cd_donors->findFirst("uid=$uid");
            $visit = $find_cd->getVisit();
            $find_cd->setVisit($visit+1);
            $find_cd->update();
            if($find_cd->update()){
                $this->view->setVar("donor",$find);
            }else{
                return $this->response->redirect();
            }
        }
        else{
            return $this->response->redirect();
        }
    }
    public function profileAction(){
        $auth = $this->auth();
        $uid = $auth['uid'];
        $user = CdUser::findFirst("uid=$uid");
        $post = CdPost::count("uid = $uid");
        $this->view->setVar("user",$user);
        $this->view->setVar("post",$post);
        $this->view->setVar("auth",$auth);
    }
    public function updateUserAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isAjax() && $request->isPost() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $uid = $request->getPost("uid");
            $user = new CdUser();
            $find = $user->findFirst($uid);
            $usnm = str_replace(" ","-",$request->getPost("username"));
            $find->setName($request->getPost("name"))
                ->setLastName($request->getPost("last_name"))
                ->setSecondName($request->getPost("second_name"))
                ->setSex($request->getPost("sex"))
                ->setPhone($request->getPost("phone"))
                ->setUsername($usnm)
                ->setEmail($request->getPost("email"))
                ->setCargo($request->getPost("cargo"));
            if($find->update()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                $this->response(array("message"=>"update","code"=>404),200);
            }
        }else{
            return $this->response->redirect();
            exit();
        }
    }
    public function updatePasswordAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isAjax() && $request->isPost() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $uid = $request->getPost("uid");
            $user = new CdUser();
            $find = $user->findFirst($uid);
            $find->setPassword($this->security->hash($request->getPost("password")));
            if($find->update()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                $this->response(array("message"=>"update","code"=>404),200);
            }
        }else{
            return $this->response->redirect();
            exit();
        }
    }
    public function updateUserImageAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isAjax() && $request->isPost() && $auth && $this->security->checkToken($this->request->getPost('value'),$this->request->getPost('key'))){
            $uid = $request->getPost("uid");
            $user = new CdUser();
            $find = $user->findFirst($uid);
            $image_actual = $find->getPhoto();
            if($image_actual==$request->getPost("photo")){
                $this->response(array("message"=>"warning","code"=>303),200);
            }else{
                $find->setPhoto($request->getPost("photo"));
                if($find->update()){
                    $_SESSION['auth']['photo'] = $request->getPost("photo");
                    $this->response(array("message"=>"SUCCESS","code"=>200),200);
                }else{
                    $this->response(array("message"=>"error","code"=>404),200);
                }
            }
        }else{
            return $this->response->redirect();
            exit();
        }
    }
    public function uploadImageAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/assets/images/users/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/assets/images/users/".$new_image);
                        $newImageThumbnail = $image_transform->resize(null,200);
                        $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/assets/images/users/thumbnail/".$new_image);
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
    public function validateEmailAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $email = $this->request->getPost("email");
            $user = new CdUser();
            $find  = $user->findFirst("email='$email'");
            if($find==null){
                $this->response(array('valid' => true),200);
            }
            elseif($find!=null){
                $this->response(array('valid' => false),200);
            }
            else{
                $this->response(array("message"=>"error try again","code"=>"404"),404);
            }
        }
    }
    public function validateUsernameAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $username = str_replace(" ","-",$request->getPost("username"));
            $user = new CdUser();
            $find  = $user->findFirst("username='$username'");
            if($find==null){
                $this->response(array('valid' => true),200);
            }
            elseif($find!=null){
                $this->response(array('valid' => false),200);
            }
            else{
                $this->response(array("message"=>"error try again","code"=>"404"),404);
            }
        }
    }
    public function SendEmail($account){
        $email = new PHPMailer();
        $email->isSMTP();
        //$email->SMTPDebug = 0;
        //$email->Debugoutput = 'html';

        $email->Host = "smtp.gmail.com";
        $email->Port=587;
        $email->SMTPSecure="tls";
        $email->SMTPAuth =true;
        $email->Username = "team-developers@c-developers.com";
        $email->Password = "ChNtLdVlPrS20E#";

        $email->setFrom("team-developers@c-developers.com","C-Developers");
        $email->addReplyTo("team-developers@c-developers.com","C-Developers");
        $email->addAddress("$account");

        $email->WordWrap =100;
        //$email->addAttachment("/var/www/chontal/public/img/icono.png","icono.png");
        $email->isHTML(true);

        $email->Subject = "C-Developers";

        $file = dirname(__DIR__)."/views/email/newUser.html";
        $email->msgHTML(file_get_contents($file));
        $email->AltBody = "Gracias por unirte a nuestro sito y ahora tu sitio http://donadoresdesangre.com estaremos muy complacidos de informale sobre todos los temas y nuevos sitios a realizar. Les agradece el equipo C-Developers.";

        if(!$email->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $email->ErrorInfo;
        } else {
            return true;
        }
    }
    public function _registerSession($user){
        $this->session->set("auth",array(
                "uid" => $user->getUid(),
                "username"=>$user->getUsername(),
                "rol"=>$user->getRol(),
                "name"=>$user->getName(),
                "user_photo"=>$user->getUserPhoto(),
                "register"=>$user->getRegister(),
                "email"=>$user->getEmail()
            )
        );
    }

}
