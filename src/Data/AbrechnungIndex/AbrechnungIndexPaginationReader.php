<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AbrechnungIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
/**
* @return AbrechnungIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AbrechnungIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}