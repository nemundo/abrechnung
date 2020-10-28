<?php
namespace Nemundo\Abrechnung\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class AbrechnungCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungModel());
$this->addModel(new \Nemundo\Abrechnung\Data\Journal\JournalModel());
$this->addModel(new \Nemundo\Abrechnung\Data\Kasse\KasseModel());
}
}