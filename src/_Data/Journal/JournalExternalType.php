<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $abrechnungId;

/**
* @var \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungExternalType
*/
public $abrechnung;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $datum;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\Number\DecimalNumberType
*/
public $betrag;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $kasseId;

/**
* @var \Nemundo\Abrechnung\Data\Kasse\KasseExternalType
*/
public $kasse;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $beleg;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $belegNr;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $belegDatei;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userCreated;

/**
* @var \Nemundo\Model\Type\User\ModifiedUserType
*/
public $userModifiedId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userModified;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Model\Type\DateTime\ModifiedDateTimeType
*/
public $dateTimeModified;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = JournalModel::class;
$this->externalTableName = "abrechnung_journal";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->abrechnungId = new \Nemundo\Model\Type\Id\IdType();
$this->abrechnungId->fieldName = "abrechnung";
$this->abrechnungId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->abrechnungId->aliasFieldName = $this->abrechnungId->tableName ."_".$this->abrechnungId->fieldName;
$this->abrechnungId->label = "Abrechnung";
$this->addType($this->abrechnungId);

$this->datum = new \Nemundo\Model\Type\DateTime\DateType();
$this->datum->fieldName = "datum";
$this->datum->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->datum->aliasFieldName = $this->datum->tableName . "_" . $this->datum->fieldName;
$this->datum->label = "Datum";
$this->addType($this->datum);

$this->text = new \Nemundo\Model\Type\Text\TextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

$this->betrag = new \Nemundo\Model\Type\Number\DecimalNumberType();
$this->betrag->fieldName = "betrag";
$this->betrag->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->betrag->aliasFieldName = $this->betrag->tableName . "_" . $this->betrag->fieldName;
$this->betrag->label = "Betrag";
$this->addType($this->betrag);

$this->kasseId = new \Nemundo\Model\Type\Id\IdType();
$this->kasseId->fieldName = "kasse";
$this->kasseId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kasseId->aliasFieldName = $this->kasseId->tableName ."_".$this->kasseId->fieldName;
$this->kasseId->label = "Kasse";
$this->addType($this->kasseId);

$this->beleg = new \Nemundo\Model\Type\Number\YesNoType();
$this->beleg->fieldName = "beleg";
$this->beleg->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->beleg->aliasFieldName = $this->beleg->tableName . "_" . $this->beleg->fieldName;
$this->beleg->label = "Beleg";
$this->addType($this->beleg);

$this->belegNr = new \Nemundo\Model\Type\Number\NumberType();
$this->belegNr->fieldName = "beleg_nr";
$this->belegNr->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->belegNr->aliasFieldName = $this->belegNr->tableName . "_" . $this->belegNr->fieldName;
$this->belegNr->label = "Beleg Nr";
$this->addType($this->belegNr);

$this->belegDatei = new \Nemundo\Model\Type\File\FileType();
$this->belegDatei->fieldName = "beleg_datei";
$this->belegDatei->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->belegDatei->aliasFieldName = $this->belegDatei->tableName . "_" . $this->belegDatei->fieldName;
$this->belegDatei->label = "Beleg Datei";
$this->addType($this->belegDatei);

$this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userCreatedId->aliasFieldName = $this->userCreatedId->tableName ."_".$this->userCreatedId->fieldName;
$this->userCreatedId->label = "User Created";
$this->addType($this->userCreatedId);

$this->userModifiedId = new \Nemundo\Model\Type\User\ModifiedUserType();
$this->userModifiedId->fieldName = "user_modified";
$this->userModifiedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userModifiedId->aliasFieldName = $this->userModifiedId->tableName ."_".$this->userModifiedId->fieldName;
$this->userModifiedId->label = "User Modified";
$this->addType($this->userModifiedId);

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeCreated->aliasFieldName = $this->dateTimeCreated->tableName . "_" . $this->dateTimeCreated->fieldName;
$this->dateTimeCreated->label = "Date Time Created";
$this->addType($this->dateTimeCreated);

$this->dateTimeModified = new \Nemundo\Model\Type\DateTime\ModifiedDateTimeType();
$this->dateTimeModified->fieldName = "date_time_modified";
$this->dateTimeModified->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeModified->aliasFieldName = $this->dateTimeModified->tableName . "_" . $this->dateTimeModified->fieldName;
$this->dateTimeModified->label = "Date Time Modified";
$this->addType($this->dateTimeModified);

}
public function loadAbrechnung() {
if ($this->abrechnung == null) {
$this->abrechnung = new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungExternalType(null, $this->parentFieldName . "_abrechnung");
$this->abrechnung->fieldName = "abrechnung";
$this->abrechnung->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->abrechnung->aliasFieldName = $this->abrechnung->tableName ."_".$this->abrechnung->fieldName;
$this->abrechnung->label = "Abrechnung";
$this->addType($this->abrechnung);
}
return $this;
}
public function loadKasse() {
if ($this->kasse == null) {
$this->kasse = new \Nemundo\Abrechnung\Data\Kasse\KasseExternalType(null, $this->parentFieldName . "_kasse");
$this->kasse->fieldName = "kasse";
$this->kasse->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kasse->aliasFieldName = $this->kasse->tableName ."_".$this->kasse->fieldName;
$this->kasse->label = "Kasse";
$this->addType($this->kasse);
}
return $this;
}
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_created");
$this->userCreated->fieldName = "user_created";
$this->userCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userCreated->aliasFieldName = $this->userCreated->tableName ."_".$this->userCreated->fieldName;
$this->userCreated->label = "User Created";
$this->addType($this->userCreated);
}
return $this;
}
public function loadUserModified() {
if ($this->userModified == null) {
$this->userModified = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_modified");
$this->userModified->fieldName = "user_modified";
$this->userModified->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userModified->aliasFieldName = $this->userModified->tableName ."_".$this->userModified->fieldName;
$this->userModified->label = "User Modified";
$this->addType($this->userModified);
}
return $this;
}
}