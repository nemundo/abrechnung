<?php
namespace Nemundo\Abrechnung\Data\Kasse;
use Nemundo\Model\Form\ModelFormUpdate;
class KasseFormUpdate extends ModelFormUpdate {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
$this->model = new KasseModel();
}
}