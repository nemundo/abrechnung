<?php

namespace Nemundo\Abrechnung\Content\Abrechnung;

use Nemundo\Abrechnung\Com\Container\BelegContainer;
use Nemundo\Abrechnung\Com\Table\JournalTable;
use Nemundo\Abrechnung\Com\Table\KontostandTable;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Heading\H3;
use Nemundo\Html\Heading\H4;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class AbrechnungContentView extends AbstractContentView
{
    /**
     * @var AbrechnungContentType
     */
    public $contentType;

    public function getContent()
    {

        $abrechnungRow=$this->contentType->getDataRow();

        $h4=new H4($this);
        $h4->content='Abrechnung';

        $h2=new H2($this);
        $h2->content=$abrechnungRow->abrechnung;

        $table=new JournalTable($this);
        //$table->abrechnungId=$abrechnungRow->id;
        $table->abrechnungContentType=$this->contentType;
        $table->editMode=false;




        $container=new BelegContainer($this);
        $container->abrechnungContentType = $this->contentType;

        $h3=new H3($this);
        $h3->content='Kontostand';

        $table=new KontostandTable($this);
        $table->abrechnungId=$abrechnungRow->id;




        /*$ul=new UnorderedList($this);

        foreach ($this->contentType->getJournalReaderData() as $journalRow) {

            $div = new Div($ul);

            $p=new Paragraph($div);
            $p->content='Beleg Nr. '.$journalRow->belegNr;

            $img=new BootstrapResponsiveImage($div);
            $img->src = $journalRow->belegBild->getImageUrl($journalRow->model->belegBildAutoSize500);


        }*/



        /*
        $btn=new AdminSiteButton($this);
        $btn->site=$this->contentType->getViewSite();*/


        return parent::getContent();
    }
}