<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AbrechnungModel();
}
}