<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AbrechnungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
}