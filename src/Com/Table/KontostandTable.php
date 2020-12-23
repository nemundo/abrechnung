<?php

namespace Nemundo\Abrechnung\Com\Table;


use Nemundo\Abrechnung\Berechnung\KasseBetrag;
use Nemundo\Abrechnung\Data\Konto\KontoReader;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\Number\Number;

class KontostandTable extends AdminTable
{

    /**
     * @var string
     */
    public $abrechnungId;

    public function getContent()
    {

        //$this->caption = 'Kontostand';


        $reader =new KontoReader();

        $header = new TableHeader($this);
        $header->addText($reader->model->konto->label);
        $header->addText($reader->model->iban->label);
        $header->addText('Kontostand');

        foreach ($reader->getData() as $kasseRow) {
            $row = new TableRow($this);
            $row->addText($kasseRow->konto);
            $row->addText($kasseRow->iban);
            $row->addText((new Number( (new KasseBetrag($this->abrechnungId))->getTotal($kasseRow->id)))->formatNumber(2));
        }

        return parent::getContent();

    }

}