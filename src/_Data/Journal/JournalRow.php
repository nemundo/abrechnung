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
* @var string
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
* @var float
*/
public $betrag;

/**
* @var string
*/
public $kasseId;

/**
* @var \Nemundo\Abrechnung\Data\Kasse\KasseRow
*/
public $kasse;

/**
* @var bool
*/
public $beleg;

/**
* @var int
*/
public $belegNr;

/**
* @var \Nemundo\Model\Reader\Property\File\FileReaderProperty
*/
public $belegDatei;

/**
* @var string
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $userCreated;

/**
* @var string
*/
public $userModifiedId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $userModified;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeModified;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->abrechnungId = $this->getModelValue($model->abrechnungId);
if ($model->abrechnung !== null) {
$this->loadAppAppAbrechnungDataAbrechnungAbrechnungabrechnungRow($model->abrechnung);
}
$value = $this->getModelValue($model->datum);
if ($value !== "0000-00-00") {
$this->datum = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->datum));
}
$this->text = $this->getModelValue($model->text);
$this->betrag = floatval($this->getModelValue($model->betrag));
$this->kasseId = $this->getModelValue($model->kasseId);
if ($model->kasse !== null) {
$this->loadAppAppAbrechnungDataKasseKassekasseRow($model->kasse);
}
$this->beleg = boolval($this->getModelValue($model->beleg));
$this->belegNr = intval($this->getModelValue($model->belegNr));
$this->belegDatei = new \Nemundo\Model\Reader\Property\File\FileReaderProperty($row, $model->belegDatei);
$this->userCreatedId = $this->getModelValue($model->userCreatedId);
if ($model->userCreated !== null) {
$this->loadNemundoUserDataUserUseruserCreatedRow($model->userCreated);
}
$this->userModifiedId = $this->getModelValue($model->userModifiedId);
if ($model->userModified !== null) {
$this->loadNemundoUserDataUserUseruserModifiedRow($model->userModified);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
$this->dateTimeModified = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeModified));
}
private function loadAppAppAbrechnungDataAbrechnungAbrechnungabrechnungRow($model) {
$this->abrechnung = new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow($this->row, $model);
}
private function loadAppAppAbrechnungDataKasseKassekasseRow($model) {
$this->kasse = new \Nemundo\Abrechnung\Data\Kasse\KasseRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserCreatedRow($model) {
$this->userCreated = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserModifiedRow($model) {
$this->userModified = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}