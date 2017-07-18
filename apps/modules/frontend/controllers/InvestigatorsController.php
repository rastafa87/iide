<?php
namespace Modules\Frontend\Controllers;

use Modules\Models\CdInvestigador;

class InvestigatorsController extends ControllerBase
{
    public function indexAction(){
        $title = "Investigadores de IIDE";
        $url ="/investigadores";
        $description = "Todo los Investigadores de IIDE.";
        $this->metaHome($title,$url,$description);
        $inves = CdInvestigador::find("status='ACTIVE'");
        $this->view->setVar("inves", $inves);
    }
    public function profile1Action(){
        $investigador = $this->dispatcher->getParam("investigador");
        $find = CdInvestigador::findFirst("permalink='".$investigador."'");
        $this->view->setVar("investigador",$find);
        $title = "".$find->getName()." | IIDE";
        $url ="/investigadores/".$find->getPermalink();
        $description = "IIDE es un instituto de derecho electoral en villahermosa tabasco.";
        $this->metaHome($title,$url,$description);
    }
}