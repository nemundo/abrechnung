<?php

namespace Nemundo\Abrechnung\Com\Table;


use Nemundo\Abrechnung\Berechnung\TotalBetrag;
use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Parameter\JournalParameter;
use Nemundo\Abrechnung\Site\JournalDeleteSite;
use Nemundo\Abrechnung\Site\JournalEditSite;
use Nemundo\Abrechnung\Site\JournalViewSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Table\Td;

class JournalTable extends AdminTable
{

    /**
     * @var string
     */
    public $abrechnungId;

    public function getContent()
    {

        $header = new TableHeader($this);
        $header->addText('Beleg Nr.');
        $header->addText('Datum');
        $header->addText('Text');
        $header->addText('Betrag');
        $header->addText('Bezahlt von');
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        $reader = new JournalReader();
        $reader->model->loadKasse();
        $reader->filter->andEqual($reader->model->abrechnungId, $this->abrechnungId);
        $reader->addOrder($reader->model->beleg, SortOrder::DESCENDING);
        $reader->addOrder($reader->model->belegNr);
        $reader->addOrder($reader->model->datum);

        foreach ($reader->getData() as $journalRow) {

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

            $row->addText($journalRow->kasse->kasse);

            $site = clone(JournalViewSite::$site);
            $site->addParameter(new AbrechnungParameter($this->abrechnungId));
            $site->addParameter(new JournalParameter($journalRow->id));
            $row->addIconSite($site);

            $site = clone(JournalEditSite::$site);
            $site->addParameter(new AbrechnungParameter($this->abrechnungId));
            $site->addParameter(new JournalParameter($journalRow->id));
            $row->addIconSite($site);

            $site = clone(JournalDeleteSite::$site);
            $site->addParameter(new JournalParameter($journalRow->id));
            $row->addIconSite($site);

        }

        $row = new TableRow($this);
        $row->addEmpty();
        $row->addEmpty();
        $row->addBoldText('Total');

        $td = new Td($row);
        $td->addAttribute('style', 'text-align:right');

        $bold = new Bold($td);
        $bold->content = (new TotalBetrag())->getTotal($this->abrechnungId);

        $row->addEmpty();
        $row->addEmpty();
        $row->addEmpty();
        $row->addEmpty();

        return parent::getContent();

    }

}