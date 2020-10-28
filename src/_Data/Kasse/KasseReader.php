<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KasseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
/**
* @return KasseRow[]
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
* @return KasseRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KasseRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KasseRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}