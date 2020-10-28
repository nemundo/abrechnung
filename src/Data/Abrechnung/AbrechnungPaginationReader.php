<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AbrechnungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
/**
* @return AbrechnungRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AbrechnungRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}