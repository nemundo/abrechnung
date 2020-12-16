<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KontoModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $konto;

/**
* @var string
*/
public $iban;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->konto = $this->getModelValue($model->konto);
$this->iban = $this->getModelValue($model->iban);
}
}