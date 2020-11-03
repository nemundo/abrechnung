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
public $parentId;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $abrechnung;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->abrechnung, $this->abrechnung);
parent::update();
}
}