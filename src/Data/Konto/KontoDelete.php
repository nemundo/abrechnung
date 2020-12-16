<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KontoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontoModel();
}
}