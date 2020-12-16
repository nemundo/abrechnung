<?php
namespace Nemundo\Abrechnung\Data\Journal;
use Nemundo\Model\Data\AbstractModelUpdate;
class JournalUpdate extends AbstractModelUpdate {
/**
* @var JournalModel
*/
public $model;

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
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $belegBild;

/**
* @var string
*/
public $kontoId;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
$this->datum = new \Nemundo\Core\Type\DateTime\Date();
$this->belegBild = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->belegBild, $this->typeValueList);
}
public function update() {
$this->typeValueList->setModelValue($this->model->abrechnungId, $this->abrechnungId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->datum, $this->typeValueList);
$property->setValue($this->datum);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->beleg, $this->beleg);
$this->typeValueList->setModelValue($this->model->belegNr, $this->belegNr);
if (!is_null($this->betrag)) $this->betrag = str_replace(",", ".", $this->betrag);
$this->typeValueList->setModelValue($this->model->betrag, $this->betrag);
$this->typeValueList->setModelValue($this->model->kontoId, $this->kontoId);
parent::update();
}
}