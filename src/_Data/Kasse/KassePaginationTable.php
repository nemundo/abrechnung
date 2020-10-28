<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KassePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new KasseModel();
}
}