<?php
namespace Modules\Dashboard\Controllers;

use Modules\Models\CdCategory;
use Modules\Models\CdSubcategory;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize(){
        $this->assets->collection('JsIndex')
            ->setTargetPath("dash/js/general.min.js")
            ->setTargetUri("dash/js/general.min.js")
            ->addJs("dash/js/plugins/jquery/jquery.min.js")
            ->addJs("dash/js/plugins/jquery/jquery-ui.min.js")
            ->addJs("dash/js/plugins/bootstrap/bootstrap.min.js")
            ->addJs("dash/js/plugins/icheck/icheck.min.js")
            ->addJs("dash/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js")
            ->addJs("dash/js/plugins/dropzone/dropzone.min.js")
            ->addJs("dash/js/plugins/scrolltotop/scrolltopcontrol.js")
            ->addJs("dash/js/plugins/morris/raphael-min.js")
            ->addJs("dash/js/plugins/morris/morris.min.js")
            //->addJs("dash/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")
            //->addJs("dash/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")
            ->addJs("dash/js/plugins/moment.min.js")
            ->addJs("dash/js/plugins/BootstrapDP/bootstrap-datepicker.min.js")
            ->addJs("dash/js/plugins/BootstrapDP/bootstrap-datepicker.es.min.js")
            ->addJs("dash/js/plugins/owl/owl.carousel.min.js")
            ->addJs("dash/js/plugins/daterangepicker/daterangepicker.js")
            ->addJs("dash/js/plugins/bootstrapV/formValidation.min.js")
            ->addJs("dash/js/plugins/bootstrapV/bootstrapV.min.js")
            ->addJs("dash/js/plugins/bootstrap/bootstrap-select.js")
            ->addJs("dash/js/plugins/summernote/summernote.js")
            ->addJs("dash/js/plugins/datatables/jquery.dataTables.min.js")
            ->addJs("dash/js/plugins/select/select2.min.js")
            ->addJs("dash/js/plugins/select/es.js")
            ->addJs("dash/js/custom2.js")
            ->addJs("dash/js/curso/curso.js")
            ->addJs("dash/js/area.js")
            ->addJs("dash/js/custom.upload.files.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());

        $this->assets->collection('CssIndex')
            ->setTargetPath("dash/css/general.min.css")
            ->setTargetUri("dash/css/general.min.css")
            ->addCss("dash/css/jquery/jquery-ui.min.css")
            ->addCss("dash/css/summernote/summernote.css")
            ->addCss("dash/css/nvd3/nv.d3.css")
            ->addCss("dash/css/mcustomscrollbar/jquery.mCustomScrollbar.css")
            ->addCss("dash/css/fullcalendar/fullcalendar.css")
            ->addCss("dash/css/blueimp/blueimp-gallery.min.css")
            ->addCss("dash/css/rickshaw/rickshaw.css")
            ->addCss("dash/css/dropzone/dropzone.css")
            ->addCss("dash/css/animate/animate.min.css")
            ->addCss("dash/css/bootstrapV/formValidation.min.css")
            ->addCss("dash/css/BDP/bootstrap-datepicker3.css")
            ->addCss("dash/css/select/select2.min.css")
            ->addCss("dash/css/select/select2-bootstrap.css")
            ->addCss("dash/css/iide.css")

            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());

        $this->view->setLayout("index");
    }
    public function auth(){
        return $this->session->get("auth");
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
    public function getCategory(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/category.json";
        $get_file = file_get_contents($json);
        if(!file_exists($json) || empty($get_file)){
            $file = fopen($json,"wb");
            $category = new CdCategory();
            $find = $category->find();
            $content = array();
            foreach($find as  $values){
                $content[$values->getCgid()]=$values->getNameCategory();
            }
            $category_json = json_encode($content);
            fwrite($file,$category_json);
            fclose($file);
            return $category_json;
        }else{
            return $get_file;
        }
    }
    public function getSubCategory(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/subCategory.json";
        $get_file = file_get_contents($json);
        if(!file_exists($json) || empty($get_file)){
            $file = fopen($json,"wb");
            $subCategory = new CdSubcategory();
            $find = $subCategory->find();
            $content = array();
            foreach($find as $values){
                $content[$values->getScid()][$values->getCgid()]=$values->getSubcategoryname();
            }
            $subCategory_json = json_encode($content);
            fwrite($file,$subCategory_json);
            fclose($file);
            return $subCategory_json;
        }else{
            return $get_file;
        }
    }

    public function getCategoryLaw(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/categoryLaw.json";
        $get_file = file_get_contents($json);
        if(!file_exists($json) || empty($get_file)){
            $file = fopen($json,"wb");
            $categoryLaw = new CdCategoryLaw();
            $find = $categoryLaw->find();
            $content = array();
            foreach($find as  $values){
                $content[$values->getClid()]=$values->getNameCategoryLaw();
            }
            $categoryLaw_json = json_encode($content);
            fwrite($file,$categoryLaw_json);
            fclose($file);
            return $categoryLaw_json;
        }else{
            return $get_file;
        }
    }

}
