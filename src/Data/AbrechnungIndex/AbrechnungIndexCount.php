<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AbrechnungIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
}