<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var KasseModel
*/
protected $model;

/**
* @var string
*/
public $kasse;

/**
* @var string
*/
public $iban;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->kasse, $this->kasse);
$this->typeValueList->setModelValue($this->model->iban, $this->iban);
$id = parent::save();
return $id;
}
}