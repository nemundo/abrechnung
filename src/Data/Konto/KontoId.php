<?php
namespace Nemundo\Abrechnung\Data\Konto;
use Nemundo\Model\Id\AbstractModelIdValue;
class KontoId extends AbstractModelIdValue {
/**
* @var KontoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KontoModel();
}
}