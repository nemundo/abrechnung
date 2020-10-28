<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KasseModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $kasse;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->kasse = $this->getModelValue($model->kasse);
}
}