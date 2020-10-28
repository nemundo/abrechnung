<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AbrechnungModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $abrechnung;

/**
* @var int
*/
public $groupId;

/**
* @var \Nemundo\Content\Index\Group\Data\Group\GroupRow
*/
public $group;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->abrechnung = $this->getModelValue($model->abrechnung);
$this->groupId = intval($this->getModelValue($model->groupId));
if ($model->group !== null) {
$this->loadNemundoContentIndexGroupDataGroupGroupgroupRow($model->group);
}
}
private function loadNemundoContentIndexGroupDataGroupGroupgroupRow($model) {
$this->group = new \Nemundo\Content\Index\Group\Data\Group\GroupRow($this->row, $model);
}
}