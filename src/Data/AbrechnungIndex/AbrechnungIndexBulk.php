<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AbrechnungIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->abrechnung, $this->abrechnung);
$id = parent::save();
return $id;
}
}