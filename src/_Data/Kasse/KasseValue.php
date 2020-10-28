<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KasseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
}