<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
use Nemundo\Model\Data\AbstractModelUpdate;
class AbrechnungUpdate extends AbstractModelUpdate {
/**
* @var AbrechnungModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->abrechnung, $this->abrechnung);
$this->typeValueList->setModelValue($this->model->groupId, $this->groupId);
parent::update();
}
}