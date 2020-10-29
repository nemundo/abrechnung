<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AbrechnungIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
}