<?php

namespace Nemundo\Abrechnung\Com\Table;


use Nemundo\Abrechnung\Berechnung\TotalBetrag;
use Nemundo\Abrechnung\Content\Abrechnung\AbrechnungContentType;
use Nemundo\Abrechnung\Data\Journal\JournalModel;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Parameter\JournalParameter;
use Nemundo\Abrechnung\Site\JournalDeleteSite;
use Nemundo\Abrechnung\Site\JournalEditSite;
use Nemundo\Abrechnung\Site\JournalViewSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Table\Td;

class JournalTable extends AdminTable
{

    /**
     * @var AbrechnungContentType
     */
    public $abrechnungContentType;

    /**
     * @var string
     */
    //public $abrechnungId;

    /**
     * @var bool
     */
    public $editMode = true;

    public function getContent()
    {

        $model=new JournalModel();
        $model->loadKonto();

        $header = new TableHeader($this);
        $header->addText('Beleg Nr.');
        $header->addText('Datum');
        $header->addText('Text');
        $header->addText('Betrag');
        $header->addText($model->konto->label);

        if ($this->editMode) {
            $header->addEmpty();
            $header->addEmpty();
            $header->addEmpty();
        }

        foreach ($this->abrechnungContentType->getJournalReaderData() as $journalRow) {

            $row = new TableRow($this);

            if ($journalRow->beleg) {
                $row->addText($journalRow->belegNr);
            } else {
                $row->addEmpty();
            }

            $row->addText($journalRow->datum->getShortDateFormat());
            $row->addText($journalRow->text);

            $td = new Td($row);
            $td->addAttribute('style', 'text-align:right');
            $td->content = (new Number($journalRow->betrag))->formatNumber(2);

            $row->addText($journalRow->konto->konto);

            if ($this->editMode) {
                $site = clone(JournalViewSite::$site);
                $site->addParameter($this->abrechnungContentType->getParameter());
                $site->addParameter(new JournalParameter($journalRow->id));
                $row->addIconSite($site);

                $site = clone(JournalEditSite::$site);
                $site->addParameter($this->abrechnungContentType->getParameter());
                $site->addParameter(new JournalParameter($journalRow->id));
                $row->addIconSite($site);

                $site = clone(JournalDeleteSite::$site);
                $site->addParameter(new JournalParameter($journalRow->id));
                $row->addIconSite($site);
            }

        }

        $row = new TableRow($this);
        $row->addEmpty();
        $row->addEmpty();
        $row->addBoldText('Total');

        $td = new Td($row);
        $td->addAttribute('style', 'text-align:right');

        $bold = new Bold($td);
        $bold->content = (new TotalBetrag())->getTotal($this->abrechnungContentType->getDataId());

        if ($this->editMode) {
            $row->addEmpty();
            $row->addEmpty();
            $row->addEmpty();
            $row->addEmpty();
        }

        return parent::getContent();

    }

}