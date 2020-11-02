<?php

namespace Nemundo\Abrechnung\Content\Abrechnung;

use Nemundo\Abrechnung\Com\Table\JournalTable;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Heading\H2;

class AbrechnungContentView extends AbstractContentView
{
    /**
     * @var AbrechnungContentType
     */
    public $contentType;

    public function getContent()
    {

        $abrechnungRow=$this->contentType->getDataRow();

        $h2=new H2($this);
        $h2->content=$abrechnungRow->abrechnung;

        $table=new JournalTable($this);
        $table->abrechnungId=$abrechnungRow->id;
        $table->editMode=false;

        /*
        $btn=new AdminSiteButton($this);
        $btn->site=$this->contentType->getViewSite();*/


        return parent::getContent();
    }
}