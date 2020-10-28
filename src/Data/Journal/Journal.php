<?php
namespace Nemundo\Abrechnung\Data\Journal;
class Journal extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var JournalModel
*/
protected $model;

/**
* @var string
*/
public $abrechnungId;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $datum;

/**
* @var string
*/
public $text;

/**
* @var bool
*/
public $beleg;

/**
* @var int
*/
public $belegNr;

/**
* @var float
*/
public $betrag;

/**
* @var string
*/
public $kasseId;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
$this->datum = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$this->typeValueList->setModelValue($this->model->abrechnungId, $this->abrechnungId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->datum, $this->typeValueList);
$property->setValue($this->datum);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->beleg, $this->beleg);
$this->typeValueList->setModelValue($this->model->belegNr, $this->belegNr);
if (!is_null($this->betrag)) $this->betrag = str_replace(",", ".", $this->betrag);
$this->typeValueList->setModelValue($this->model->betrag, $this->betrag);
$this->typeValueList->setModelValue($this->model->kasseId, $this->kasseId);
$id = parent::save();
return $id;
}
}