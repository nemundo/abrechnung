<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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