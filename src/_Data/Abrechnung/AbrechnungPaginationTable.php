<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AbrechnungModel();
}
}