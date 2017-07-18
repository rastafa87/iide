<?php
namespace Modules\Frontend\Controllers;
use Phalcon\Mvc\Controller;
class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets->collection('FrontEndJs')
            ->setTargetPath("front/src/js/general1.min.js")
            ->setTargetUri("front/src/js/general1.min.js")
            ->addJs("front/src/js/bootstrap.min.js")
            ->addJs("front/src/js/jquery.bxslider.min.js")
            ->addJs("front/src/js/owl.carousel.js")
            ->addJs("front/src/js/waypoint.js")
            ->addJs("front/src/js/jquery.counterup.min.js")
            ->addJs("front/src/js/jquery.noconflict.js")
            ->addJs("front/src/js/theme-scripts.js")
            ->addJs("front/src/js/jquery.mCustomScrollbar.concat.min.js")
            ->addJs("front/src/js/jquery.accordion.js")
            ->addJs("front/src/js/unslider-min.js")
            ->addJs("front/src/js/formValidation.min.js")
            ->addJs("front/src/js/bootstrapV.min.js")
            ->addJs("front/src/js/jssor.slider-23.1.6.mini.js")
            ->addJs("front/src/js/pgwslideshow2.min.js")
            ->addJs("front/src/js/map/jquery.vmap.js")
            ->addJs("front/src/js/map/jquery.vmap.world.js")
            ->addJs("front/src/js/map/jquery.vmap.sampledata.js")
            ->addJs("front/src/js/ibedel.js")
            ->addJs("front/src/js/custom.js")
            ->addJs("front/src/js/index/index.js")
            ->addJs("front/src/js/map/mapIbedel.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());


        $this->assets->collection('FrontEndJs2')
            ->setTargetPath("front/src/js/general1.min.js")
            ->setTargetUri("front/src/js/general1.min.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());

        $this->assets->collection('FrontEndCss')
            ->setTargetPath("front/src/css/general1.min.css")
            ->setTargetUri("front/src/css/general1.min.css")
            ->addCss("front/src/css/custom.css")
            ->addCss("front/src/css/general.css")
            ->addCss("front/src/css/bootstrap.css")
            ->addCss("front/src/css/bootstrapTheme.css")
            ->addCss("front/src/css/formValidation.min.css")
            ->addCss("front/src/css/responsive.css")
            ->addCss("front/src/css/color.css")
            ->addCss("front/src/css/jquery.bxslider.css")
            ->addCss("front/src/css/jquery.mCustomScrollbar.css")
            ->addCss("front/src/css/owl.carousel.css")
            ->addCss("front/src/css/pgwslideshow2.min.css")
            ->addCss("front/src/css/owl.theme.css")
            ->addCss("front/src/css/unslider-dots.css")
            ->addCss("front/src/css/unslider.css")
            ->addCss("front/src/css/map/jqvmap.css")

            /*->addCss("front/src/css/mobile.css")
            ->addCss("front/src/css/reset.css")*/
            ->addCss("front/src/css/ibedel.css")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
        $this->session->set("user",array("session" => true,));
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
        exit();
    }
    public function metaHome($action,$canonical,$description){
        $this->session->set("meta",
            array(
                "title"=>"$action",
                "url"=>$this->url->getBaseUri()."$canonical",
                "description"=>"$description"
            )
        );
        /*{{ router.getRewriteUri() }}*/
    }
    public function header($action){
        $ct = array("futbol"=>"F","basquetbol"=>"B","beisbol"=>"BE","box"=>"BX","otros"=>"O","contactanos"=>"C","index"=>"I","acerca"=>"AC");
        $this->session->set("header",
            array(
                "$ct[$action]"=>"current-menu-ancestor",
            )
        );
    }
    public function cleaCategory($string){
        return  mb_strtolower(str_replace(' ', '-',str_replace('-','',$string)), 'UTF-8');
    }
    public function dateSpanish(){
        return array(
            "01"=>"Enero",
            "02"=>"Febrero",
            "03"=>"Marzo",
            "04"=>"Abril",
            "05"=>"Mayo",
            "06"=>"Junio",
            "07"=>"Julio",
            "08"=>"Agosto",
            "09"=>"Septiembre",
            "10"=>"Octubre",
            "11"=>"Noviembre",
            "12"=>"Diciembre"
        );
    }
    protected function url_clean($string) {
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
    protected function token(){
        return $token = array("key"=>$this->security->getToken(),"value"=>$this->security->getTokenKey());
    }
   /* protected function getSession(){
        return $this->session->get("user");
    }*/
    protected function getFormatDate($date){
        $dateS = $this->dateSpanish();
        $newDate = explode("-",$date);
        $newDate = $newDate["2"]." de ".$dateS[$newDate["1"]]." del ".$newDate["0"];
        return  $newDate;
    }
    
}