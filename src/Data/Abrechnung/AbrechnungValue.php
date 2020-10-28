<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AbrechnungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
}