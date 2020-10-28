<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var JournalModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $abrechnungId;

/**
* @var \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow
*/
public $abrechnung;

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
* @var int
*/
public $kasseId;

/**
* @var \Nemundo\Abrechnung\Data\Kasse\KasseRow
*/
public $kasse;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->abrechnungId = intval($this->getModelValue($model->abrechnungId));
if ($model->abrechnung !== null) {
$this->loadNemundoAbrechnungDataAbrechnungAbrechnungabrechnungRow($model->abrechnung);
}
$value = $this->getModelValue($model->datum);
if ($value !== "0000-00-00") {
$this->datum = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->datum));
}
$this->text = $this->getModelValue($model->text);
$this->beleg = boolval($this->getModelValue($model->beleg));
$this->belegNr = intval($this->getModelValue($model->belegNr));
$this->betrag = floatval($this->getModelValue($model->betrag));
$this->kasseId = intval($this->getModelValue($model->kasseId));
if ($model->kasse !== null) {
$this->loadNemundoAbrechnungDataKasseKassekasseRow($model->kasse);
}
}
private function loadNemundoAbrechnungDataAbrechnungAbrechnungabrechnungRow($model) {
$this->abrechnung = new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow($this->row, $model);
}
private function loadNemundoAbrechnungDataKasseKassekasseRow($model) {
$this->kasse = new \Nemundo\Abrechnung\Data\Kasse\KasseRow($this->row, $model);
}
}