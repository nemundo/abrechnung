<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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
* @var float
*/
public $betrag;

/**
* @var string
*/
public $kasseId;

/**
* @var bool
*/
public $beleg;

/**
* @var int
*/
public $belegNr;

/**
* @var \Nemundo\Model\Data\Property\File\FileDataProperty
*/
public $belegDatei;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
$this->datum = new \Nemundo\Core\Type\DateTime\Date();
$this->belegDatei = new \Nemundo\Model\Data\Property\File\FileDataProperty($this->model->belegDatei, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->abrechnungId, $this->abrechnungId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->datum, $this->typeValueList);
$property->setValue($this->datum);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$value = (new \Nemundo\Core\Type\Text\Text($this->betrag))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->betrag, $value);
$this->typeValueList->setModelValue($this->model->kasseId, $this->kasseId);
$this->typeValueList->setModelValue($this->model->beleg, $this->beleg);
$this->typeValueList->setModelValue($this->model->belegNr, $this->belegNr);
$id = parent::save();
return $id;
}
}