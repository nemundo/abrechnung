<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class Abrechnung extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AbrechnungModel
*/
protected $model;

/**
* @var string
*/
public $abrechnung;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->abrechnung, $this->abrechnung);
$id = parent::save();
return $id;
}
}