<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AbrechnungIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->parentContentId, $this->parentContentId);
$this->typeValueList->setModelValue($this->model->abrechnungId, $this->abrechnungId);
$id = parent::save();
return $id;
}
}