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

/**
* @var string
*/
public $groupId;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->abrechnung, $this->abrechnung);
$this->typeValueList->setModelValue($this->model->groupId, $this->groupId);
$id = parent::save();
return $id;
}
}