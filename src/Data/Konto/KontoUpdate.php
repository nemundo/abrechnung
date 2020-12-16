<?php
namespace Nemundo\Abrechnung\Data\Konto;
use Nemundo\Model\Data\AbstractModelUpdate;
class KontoUpdate extends AbstractModelUpdate {
/**
* @var KontoModel
*/
public $model;

/**
* @var string
*/
public $konto;

/**
* @var string
*/
public $iban;

public function __construct() {
parent::__construct();
$this->model = new KontoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->konto, $this->konto);
$this->typeValueList->setModelValue($this->model->iban, $this->iban);
parent::update();
}
}