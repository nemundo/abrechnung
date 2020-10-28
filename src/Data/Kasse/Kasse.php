<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class Kasse extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var KasseModel
*/
protected $model;

/**
* @var string
*/
public $kasse;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->kasse, $this->kasse);
$id = parent::save();
return $id;
}
}