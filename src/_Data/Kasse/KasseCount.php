<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KasseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
}