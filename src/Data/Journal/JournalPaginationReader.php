<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new JournalRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}