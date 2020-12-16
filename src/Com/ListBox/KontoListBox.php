<?php

namespace Nemundo\Abrechnung\Com\ListBox;

use Nemundo\Abrechnung\Data\Konto\KontoReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class KontoListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Konto';

        $reader=new KontoReader();
        foreach ($reader->getData() as $kontoRow) {
            $this->addItem($kontoRow->id,$kontoRow->konto);
        }

        return parent::getContent();
    }
}