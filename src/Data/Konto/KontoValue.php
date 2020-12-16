<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KontoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontoModel();
}
}