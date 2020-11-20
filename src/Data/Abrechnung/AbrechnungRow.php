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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->abrechnung = $this->getModelValue($model->abrechnung);
}
}