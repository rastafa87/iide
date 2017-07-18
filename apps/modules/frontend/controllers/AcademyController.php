<?php
namespace Modules\Frontend\Controllers;

use Modules\Models\CdPost;
use Modules\Models\CdSubcategory;

class AcademyController extends ControllerBase
{
    public function indexAction(){
        $title = "Diplomados, Cursos, Conferencias y Talleres IIDE";
        $url ="/oferta-de-estudio";
        $description = "Oferta de Estudios de IIDE.";
        $this->metaHome($title,$url,$description);

        $diplomados = CdPost::find("status='PUBLIC' and scid=3");
        $conferencias = CdPost::find("status='PUBLIC' and scid=4");
        $foros = CdPost::find("status='PUBLIC' and scid=5");
        $talleres = CdPost::find("status='PUBLIC' and scid=6");
        $seminarios = CdPost::find("status='PUBLIC' and scid=7");

        $this->view->setVar("diplomados", $diplomados);
        $this->view->setVar("conferencias", $conferencias);
        $this->view->setVar("foros", $foros);
        $this->view->setVar("talleres", $talleres);
        $this->view->setVar("seminarios", $seminarios);
    }
    public function derechoElectoralAction(){
        $title = "derecho electoral en villahermosa tabasco";
        $url ="/oferta-de-estudio/diplomado-en-derecho-electoral-derecho-procesal-electoral";
        $description = "Derecho Electoral y Derecho Procesal Electoral.";
        $this->metaHome($title,$url,$description);
    }
    public function cursosAction(){
        $title = "derechos humanos en villahermosa tabasco";
        $url ="/oferta-de-estudio/diplomado-derechos-humanos";
        $description = "Derechos Humanos.";
        $this->metaHome($title,$url,$description);

        $curso =$this->dispatcher->getParam("curso");

        $cursoD = CdPost::findFirst("permalink='$curso' and status='PUBLIC'");
        $subcategory = CdSubcategory::findFirst("scid='$cursoD->scid'");
        $this->view->setVar("curso", $cursoD);
        $this->view->setVar("subcategory", $subcategory);
    }
    public function interpretacionAction(){
        $title = "derecho electoral en villahermosa tabasco";
        $url ="/oferta-de-estudio/diplomado-en-interpretacion-y-argumentacion-juridica";
        $description = "Derecho electoral en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
}