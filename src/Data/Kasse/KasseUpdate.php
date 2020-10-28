<?php
namespace Nemundo\Abrechnung\Data\Kasse;
use Nemundo\Model\Data\AbstractModelUpdate;
class KasseUpdate extends AbstractModelUpdate {
/**
* @var KasseModel
*/
public $model;

/**
* @var string
*/
public $kasse;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->kasse, $this->kasse);
parent::update();
}
}