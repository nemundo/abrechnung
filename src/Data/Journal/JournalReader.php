<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var JournalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
}
/**
* @return JournalRow[]
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
* @return JournalRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return JournalRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new JournalRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}