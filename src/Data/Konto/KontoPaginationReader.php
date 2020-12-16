<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KontoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontoModel();
}
/**
* @return KontoRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new KontoRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}