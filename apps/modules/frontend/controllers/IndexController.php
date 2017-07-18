<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdArea;
use Modules\Models\CdCountry;
use Modules\Models\CdInvestigador;
use Modules\Models\CdLaw;
use Modules\Models\CdPost;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";


class IndexController extends ControllerBase
{
    public function indexAction(){
        $title = "Instituo Iberoamericano de Derecho Electoral,campañas electorales";
        $url ="";
        $description = "Proceso electoral en mexico, campañas electorales en mexico, partidos politicos en mexico, jornada electoral en mexico, elecciones en mexico";
        $this->metaHome($title,$url,$description);
        $this->scripts2();
        $news = CdPost::find("status='PUBLIC' limit 6");
        $newsmovil = CdPost::find("status='PUBLIC' limit 2");
        $inves_first = CdInvestigador::findFirst("status='ACTIVE'");
        $inves = CdInvestigador::find("inveid!={$inves_first->getInveid()} and status='ACTIVE' order by RAND() limit 2");
        $inves2 = CdInvestigador::find("inveid!={$inves_first->getInveid()} and status='ACTIVE' order by RAND() limit 1");
        $this->view->setVar("inves",$inves);
        $this->view->setVar("inves2",$inves2);
        $this->view->setVar("invesfirst",$inves_first);
        $this->view->setVar("news",$news);
        $this->view->setVar("newsmovil",$newsmovil);
    }
    public function quienesSomosAction(){
        $title = "Acerca de IIDE";
        $url ="/quienes-somos";
        $description = "Acerca de IIDE es un instituto de derecho electoral en mexico.";
        $this->metaHome($title,$url,$description);
        $areas = CdArea::find("status='ACTIVE'");

        $this->view->setVar("areas",$areas);
    }
    public function iberonautasAction(){
        $title = "Redes Sociales de IIDE";
        $url ="/iberonautas";
        $description = "Redes Sociales de IIDE es un instituto de derecho electoral en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
    public function oplesAction(){
        $title = "OPLES en todo México";
        $url ="/oples";
        $description = "Información de todo los OPLES en México IIDE en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
    public function tribunalesAction(){
        $title = "Tribunales Electorales en todo México";
        $url ="/tribunales";
        $description = "Información de Tribunales Electorales en todo México IIDE en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
    public function actividadesAction(){
        $title = "Derecho Electoral en Villahermosa Tabasco";
        $url ="";
        $description = "IIDE es un instituto de derecho electoral en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
    public function contactanosAction(){
        $title = "Contactar a IIDE";
        $url ="/contactanos";
        $description = "Contactar a IIDE, teléfonos y correos.";
        $this->metaHome($title,$url,$description);
    }
    public function directorioAction(){
        $title = "Directorio de IIDE en Villahermosa Tabasco";
        $url ="/directorio";
        $description = "Directorio del instituto iberoamericano de derecho electoral.";
        $this->metaHome($title,$url,$description);
    }
    public function systemAction(){
        $title = "Sistema de Leyes de paises Iberiamericanos";
        $url ="/sistema-electoral-iberoamericano";
        $description = "Sistema de Leyes de IIDE es un instituto de derecho electoral en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);

    }
    public function sendCountryAction(){
        $request = new Request();

        $values = $request->getPost("region");
        $cd_user = CdCountry::findFirst("abbreviation='$values'");

        if(!$cd_user)$this->response(array("message"=>"prueba","code"=>404),404);
        $idCountry = $cd_user->getCoid();
        $consti = CdLaw::find("coid=$idCountry and clid=1 ");
        $electorales = CdLaw::find("coid=$idCountry and clid=2");
        $jurisprudencia = CdLaw::find("coid=$idCountry and clid=3");
        $this->response(array("content"=>$cd_user->toArray(),"consti"=>$consti->toArray(),"electorales"=>$electorales->toArray(),"jurisprudencia"=>$jurisprudencia->toArray(),"code"=>200),200);
        /*$this->response(array("electorales"=>$electorales->toArray(),"code"=>200),200);
        $this->response(array("jurisprudencia"=>$jurisprudencia->toArray(),"code"=>200),200);*/

    }
    public function revistaAction(){

        $title = "Revista de IIDE México";
        $url ="/revista";
        $description = "Información de todo los OPLES en México IIDE en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
    public function viewrevistaAction(){
        $this->getJsMagazine();

        $title = "Revista de IIDE México";
        $url ="/revista";
        $description = "Información de todo los OPLES en México IIDE en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
    private function getJsMagazine(){
        return $this->assets->collection('MagazineJs')
            ->setTargetPath("front/assets/js/magazing/general.min.js")
            ->setTargetUri("front/assets/js/magazing/general.min.js")
            ->addJs("front/magazing/jquery.min.1.7.js")
            ->addJs("front/magazing/jquery-ui-1.8.20.custom.min.js")
            ->addJs("front/magazing/modernizr.2.5.3.min.js")
            ->addJs("front/magazing/hash.js")
            ->addJs("front/magazing/jquery.mCustomScrollbar.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
    public function sendMessageContactAction()
    {
        $request = $this->request;
        if($request->isAjax() && $request->isPost()){
            $email = $request->getPost('email');
            $name  = $request->getPost('name');
            $phone = $request->getPost('phone');
            $msg = $request->getPost('msg');
            $asunto = $request->getPost('department');
            if($this->SendEmail($email,1) && $this->SendEmailAccount($email,$name,$msg,$phone,$asunto)){
                $this->response(array("code"=>200,"message"=>"data-saved"),200);
            }else{
                $this->response(array("code"=>404,"message"=>"data-error"),200);
            }
        }else{
            $this->response(array("code"=>404,"message"=>"data-error"),200);
        }
    }
    public function SendEmail($account,$type){
        $email = new \PHPMailer();
        $email->isSMTP();
        //$email->Host = gethostbyname("smtp.gmail.com");
        $email->Host = "smtp.gmail.com";
        $email->Port=587;
        $email->SMTPSecure="tls";
        $email->SMTPAuth =true;
        $email->Username = "chontaldevelopers@gmail.com";
        $email->Password = "gustavo290387";

        $email->setFrom("gustavo.alberto@c-developers.com","IIDE");
        $email->addReplyTo("gustavo.alberto@c-developers.com","IIDE");
        $email->addAddress("$account");
        $email->isHTML(true);

        $email->Subject = "IIDE";
        $file = dirname(__DIR__)."/views/email/index.html";
        $email->msgHTML(file_get_contents($file));
        if($type==1){
            $email->AltBody = "Gracias por contactarnos en breve nos comunicaremos con usted. Les agradece IIDE.";
        }else if($type==2){
            $email->AltBody = "Gracias por suscribirse a nuestro sito http://iide.com.mx/";
        }
        if(!$email->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $email->ErrorInfo;
        } else {
            return true;
        }
    }
    public function SendEmailAccount($account,$name,$message,$phone,$asunto){
        $email = new \PHPMailer();
        $email->isSMTP();
        //$email->Host = gethostbyname("smtp.gmail.com");
        $email->Host = "smtp.gmail.com";
        $email->Port=587;
        $email->SMTPSecure="tls";
        $email->SMTPAuth =true;
        $email->Username = "chontaldevelopers@gmail.com";
        $email->Password = "gustavo290387";

        $email->setFrom("$account","IIDE");
        $email->addReplyTo("gustavo.alberto@c-developers.com","IIDE");
        $email->addAddress("gustavo.alberto@c-developers.com");

        $email->WordWrap =100;
        $email->isHTML(true);

        $email->Subject = "Contacto pagina web IIDE";
        $html = "<!DOCTYPE html><head><meta charset='utf-8'><title>IIDE</title></head><body><style type='text/css'>p,strong {font-family: sans-serif;font-size: 14px;}</style><p><strong>Nombre : </strong> $name</p><p><strong>Asunto : </strong> $asunto</p><p><strong>Email : </strong> $account</p><p><strong>Teléfono : </strong> $phone</p><p><strong>Mensaje : </strong> $message</p></body></html>";
        $email->msgHTML($html);
        $email->AltBody = "$asunto";

        if(!$email->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $email->ErrorInfo;
        } else {
            return true;
        }
    }

    private function scripts2(){
        $this->assets->collection('jsPlugins2')
            ->setTargetPath("front/src/js/general.index.min.js")
            ->setTargetUri("front/src/js/general.index.min.js")
            ->addJs("front/src/js/jquery-1.11.3.min.js")
            ->addJs("front/src/js/jssor.slider-23.1.6.mini.js")
            ->addJs("front/src/js/index/index.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}