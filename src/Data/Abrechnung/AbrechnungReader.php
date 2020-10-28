<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return AbrechnungRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AbrechnungRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AbrechnungRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}