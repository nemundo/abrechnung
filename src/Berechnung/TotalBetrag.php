<?php

namespace Nemundo\Abrechnung\Berechnung;


use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Field\Aggregate\SumField;

class TotalBetrag extends AbstractBase
{

    public function getTotal($abrechnungId)
    {

        $reader = new JournalReader();
        $reader->filter->andEqual($reader->model->abrechnungId, $abrechnungId);
        $reader->addGroup($reader->model->abrechnungId);

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