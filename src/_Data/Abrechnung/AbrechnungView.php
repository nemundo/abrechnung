<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
use Nemundo\Model\View\ModelView;
class AbrechnungView extends ModelView {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AbrechnungModel();
}
}