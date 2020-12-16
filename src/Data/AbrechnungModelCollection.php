<?php
namespace Nemundo\Abrechnung\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class AbrechnungModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungModel());
$this->addModel(new \Nemundo\Abrechnung\Data\AbrechnungIndex\AbrechnungIndexModel());
$this->addModel(new \Nemundo\Abrechnung\Data\Journal\JournalModel());
$this->addModel(new \Nemundo\Abrechnung\Data\Konto\KontoModel());
}
}