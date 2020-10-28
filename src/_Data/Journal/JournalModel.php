<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "abrechnung_journal";
$this->aliasTableName = "abrechnung_journal";
$this->label = "Journal";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "abrechnung_journal";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "abrechnung_journal_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->abrechnungId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->abrechnungId->tableName = "abrechnung_journal";
$this->abrechnungId->fieldName = "abrechnung";
$this->abrechnungId->aliasFieldName = "abrechnung_journal_abrechnung";
$this->abrechnungId->label = "Abrechnung";
$this->abrechnungId->allowNullValue = false;

$this->datum = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->datum->tableName = "abrechnung_journal";
$this->datum->fieldName = "datum";
$this->datum->aliasFieldName = "abrechnung_journal_datum";
$this->datum->label = "Datum";
$this->datum->allowNullValue = false;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "abrechnung_journal";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "abrechnung_journal_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;
$this->text->length = 255;

$this->betrag = new \Nemundo\Model\Type\Number\DecimalNumberType($this);
$this->betrag->tableName = "abrechnung_journal";
$this->betrag->fieldName = "betrag";
$this->betrag->aliasFieldName = "abrechnung_journal_betrag";
$this->betrag->label = "Betrag";
$this->betrag->allowNullValue = false;

$this->kasseId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->kasseId->tableName = "abrechnung_journal";
$this->kasseId->fieldName = "kasse";
$this->kasseId->aliasFieldName = "abrechnung_journal_kasse";
$this->kasseId->label = "Kasse";
$this->kasseId->allowNullValue = false;

$this->beleg = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->beleg->tableName = "abrechnung_journal";
$this->beleg->fieldName = "beleg";
$this->beleg->aliasFieldName = "abrechnung_journal_beleg";
$this->beleg->label = "Beleg";
$this->beleg->allowNullValue = false;

$this->belegNr = new \Nemundo\Model\Type\Number\NumberType($this);
$this->belegNr->tableName = "abrechnung_journal";
$this->belegNr->fieldName = "beleg_nr";
$this->belegNr->aliasFieldName = "abrechnung_journal_beleg_nr";
$this->belegNr->label = "Beleg Nr";
$this->belegNr->allowNullValue = true;

$this->belegDatei = new \Nemundo\Model\Type\File\FileType($this);
$this->belegDatei->tableName = "abrechnung_journal";
$this->belegDatei->fieldName = "beleg_datei";
$this->belegDatei->aliasFieldName = "abrechnung_journal_beleg_datei";
$this->belegDatei->label = "Beleg Datei";
$this->belegDatei->allowNullValue = false;
$this->belegDatei->keepOrginalFilename = true;

$this->userCreatedId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userCreatedId->tableName = "abrechnung_journal";
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->aliasFieldName = "abrechnung_journal_user_created";
$this->userCreatedId->label = "User Created";
$this->userCreatedId->allowNullValue = false;

$this->userModifiedId = new \Nemundo\Model\Type\User\ModifiedUserType($this);
$this->userModifiedId->tableName = "abrechnung_journal";
$this->userModifiedId->fieldName = "user_modified";
$this->userModifiedId->aliasFieldName = "abrechnung_journal_user_modified";
$this->userModifiedId->label = "User Modified";
$this->userModifiedId->allowNullValue = false;

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTimeCreated->tableName = "abrechnung_journal";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "abrechnung_journal_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = false;
$this->dateTimeCreated->visible->form = false;

$this->dateTimeModified = new \Nemundo\Model\Type\DateTime\ModifiedDateTimeType($this);
$this->dateTimeModified->tableName = "abrechnung_journal";
$this->dateTimeModified->fieldName = "date_time_modified";
$this->dateTimeModified->aliasFieldName = "abrechnung_journal_date_time_modified";
$this->dateTimeModified->label = "Date Time Modified";
$this->dateTimeModified->allowNullValue = false;
$this->dateTimeModified->visible->form = false;

}
public function loadAbrechnung() {
if ($this->abrechnung == null) {
$this->abrechnung = new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungExternalType($this, "abrechnung_journal_abrechnung");
$this->abrechnung->tableName = "abrechnung_journal";
$this->abrechnung->fieldName = "abrechnung";
$this->abrechnung->aliasFieldName = "abrechnung_journal_abrechnung";
$this->abrechnung->label = "Abrechnung";
}
return $this;
}
public function loadKasse() {
if ($this->kasse == null) {
$this->kasse = new \Nemundo\Abrechnung\Data\Kasse\KasseExternalType($this, "abrechnung_journal_kasse");
$this->kasse->tableName = "abrechnung_journal";
$this->kasse->fieldName = "kasse";
$this->kasse->aliasFieldName = "abrechnung_journal_kasse";
$this->kasse->label = "Kasse";
}
return $this;
}
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType($this, "abrechnung_journal_user_created");
$this->userCreated->tableName = "abrechnung_journal";
$this->userCreated->fieldName = "user_created";
$this->userCreated->aliasFieldName = "abrechnung_journal_user_created";
$this->userCreated->label = "User Created";
$this->userCreated->visible->form = false;
}
return $this;
}
public function loadUserModified() {
if ($this->userModified == null) {
$this->userModified = new \Nemundo\User\Data\User\UserExternalType($this, "abrechnung_journal_user_modified");
$this->userModified->tableName = "abrechnung_journal";
$this->userModified->fieldName = "user_modified";
$this->userModified->aliasFieldName = "abrechnung_journal_user_modified";
$this->userModified->label = "User Modified";
$this->userModified->visible->form = false;
}
return $this;
}
}