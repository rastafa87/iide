<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdPost;
use Modules\Models\Vnote;
use Modules\Models\Vsectionnotes;

class NewsController extends ControllerBase
{
    public function indexAction(){
        $subcategory = $this->dispatcher->getParam("subcategory");
        $category =$this->dispatcher->getParam("category");
        $note = new Vnote();
        $find = $note->find("name_category='$category' and subcategoryname='$subcategory' order by date_public asc");
        if($find){

            $title = $category." | IIDE";
            $url = "$category"."/$subcategory";
            $image = "rosa.jpg";
            $description = $category." de IIDE";
            $this->metaHome("$title | IIDE",$url,$image,$description);
            //$this->attributesPost("$category","$description","$url");
            $this->view->setVar("note",$find);
            $this->view->setVar("category",$category);
            $this->view->setVar("date",$this->dateSpanish());
            $this->view->setVar("categoryUrl",$this->dateSpanish());
        }else{
            return $this->response->redirect("");
        }
    }
    public function news1Action(){
        $title = "Noticias | IIDE";
        $url ="/noticias/iide-instituto-iberoamericano-de-derecho-electoral";
        $description = "Noticias del Instituto Iberoamericano de Derecho Electoral.";
        $image = "";
        $this->metaHome($title,$url,$image,$description);

        $permalink = $this->dispatcher->getParam("permalink");
        $category =$this->dispatcher->getParam("category");
        $note = new Vnote();
        $find = $note->findFirst("permalink='$permalink'");
        if($find){
            @$post = new CdPost();
            @$visits = $post->findFirst($find->getPid());
            @$countVisits = $visits->getVisits();
            @$visits->setVisits($countVisits+1)->update();

            $title = $find->getTitle();
            $url = "$category"."/$permalink";
            $image = "".$find->getImage()."";
            $description = "".$find->getSummary()."";
            $this->metaHome("$title | IIDE",$url,$image,$description);
            $this->attributesPost("$category","$description","$url");
            $this->view->setVar("note",$find);
            $this->view->setVar("category",$category);
            $this->view->setVar("date",$this->dateSpanish());
            $this->view->setVar("categoryUrl",$category);
        }else{
            return $this->response->redirect("");
        }
    }
    public function subSectionAction(){
        $category = $this->dispatcher->getParam("category");
        return $this->response->redirect("$category");
    }
    public function attributesPost($header,$description_twitter,$url){
        $this->header("$header");
        $canonical = $this->url->getBaseUri();
        $this->view->setVar("twitter", $description_twitter);
        $this->view->setVar("canonical","$canonical$url");
    }
}