<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AbrechnungIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $parentContentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $parentContent;

/**
* @var int
*/
public $abrechnungId;

/**
* @var \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow
*/
public $abrechnung;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->parentContentId = intval($this->getModelValue($model->parentContentId));
if ($model->parentContent !== null) {
$this->loadNemundoContentDataContentContentparentContentRow($model->parentContent);
}
$this->abrechnungId = intval($this->getModelValue($model->abrechnungId));
if ($model->abrechnung !== null) {
$this->loadNemundoAbrechnungDataAbrechnungAbrechnungabrechnungRow($model->abrechnung);
}
}
private function loadNemundoContentDataContentContentparentContentRow($model) {
$this->parentContent = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoAbrechnungDataAbrechnungAbrechnungabrechnungRow($model) {
$this->abrechnung = new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow($this->row, $model);
}
}