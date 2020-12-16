<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KontoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontoModel();
}
}