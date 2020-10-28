<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KassePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new KasseRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}