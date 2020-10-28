<?php

namespace Nemundo\Abrechnung\Berechnung;


use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Field\Aggregate\SumField;

class KasseBetrag extends AbstractBase
{

    private $abrechnungId;

    public function __construct($abrechnungId)
    {
        $this->abrechnungId = $abrechnungId;
    }


    public function getTotal($kasseId)
    {

        $reader = new JournalReader();
        $reader->filter->andEqual($reader->model->abrechnungId,$this->abrechnungId);
        $reader->filter->andEqual($reader->model->kasseId,$kasseId);
        $reader->addGroup($reader->model->kasseId);

        $sum = new SumField($reader);
        $sum->aggregateField = $reader->model->betrag;
        $sum->roundDecimal = 2;

        $total = 0;
        foreach ($reader->getData() as $journalRow) {
            $total = $journalRow->getModelValue($sum);
        }

        return $total;

    }




}