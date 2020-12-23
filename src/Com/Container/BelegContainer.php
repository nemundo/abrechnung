<?php


namespace Nemundo\Abrechnung\Com\Container;


use Nemundo\Abrechnung\Content\Abrechnung\AbrechnungContentType;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class BelegContainer extends AbstractContainer
{

    /**
     * @var AbrechnungContentType
     */
    public $abrechnungContentType;

    public function getContent()
    {

        foreach ($this->abrechnungContentType->getJournalReaderData() as $journalRow) {

            if ($journalRow->belegBild->hasValue()) {

                $div = new Div($this);

                $p = new Paragraph($div);
                $p->content = 'Beleg Nr. ' . $journalRow->belegNr;

                $img = new BootstrapResponsiveImage($div);
                $img->src = $journalRow->belegBild->getImageUrl($journalRow->model->belegBildAutoSize500);

                new Hr($this);

            }

        }

        return parent::getContent();

    }

}