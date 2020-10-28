<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
use Nemundo\Model\Form\ModelFormUpdate;
class AbrechnungFormUpdate extends ModelFormUpdate {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
$this->model = new AbrechnungModel();
}
}