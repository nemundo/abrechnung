<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var KontoModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->konto, $this->konto);
$this->typeValueList->setModelValue($this->model->iban, $this->iban);
$id = parent::save();
return $id;
}
}