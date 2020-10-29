<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class AbrechnungIndexUpdate extends AbstractModelUpdate {
/**
* @var AbrechnungIndexModel
*/
public $model;

/**
* @var string
*/
public $parentContentId;

/**
* @var string
*/
public $abrechnungId;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->parentContentId, $this->parentContentId);
$this->typeValueList->setModelValue($this->model->abrechnungId, $this->abrechnungId);
parent::update();
}
}