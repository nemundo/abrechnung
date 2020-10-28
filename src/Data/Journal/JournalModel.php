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
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $beleg;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $belegNr;

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
$this->abrechnungId->allowNullValue = true;

$this->datum = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->datum->tableName = "abrechnung_journal";
$this->datum->fieldName = "datum";
$this->datum->aliasFieldName = "abrechnung_journal_datum";
$this->datum->label = "Datum";
$this->datum->allowNullValue = true;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "abrechnung_journal";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "abrechnung_journal_text";
$this->text->label = "Text";
$this->text->allowNullValue = true;

$this->beleg = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->beleg->tableName = "abrechnung_journal";
$this->beleg->fieldName = "beleg";
$this->beleg->aliasFieldName = "abrechnung_journal_beleg";
$this->beleg->label = "Beleg";
$this->beleg->allowNullValue = true;

$this->belegNr = new \Nemundo\Model\Type\Number\NumberType($this);
$this->belegNr->tableName = "abrechnung_journal";
$this->belegNr->fieldName = "beleg_nr";
$this->belegNr->aliasFieldName = "abrechnung_journal_beleg_nr";
$this->belegNr->label = "Beleg Nr";
$this->belegNr->allowNullValue = true;

$this->betrag = new \Nemundo\Model\Type\Number\DecimalNumberType($this);
$this->betrag->tableName = "abrechnung_journal";
$this->betrag->fieldName = "betrag";
$this->betrag->aliasFieldName = "abrechnung_journal_betrag";
$this->betrag->label = "Betrag";
$this->betrag->allowNullValue = true;

$this->kasseId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->kasseId->tableName = "abrechnung_journal";
$this->kasseId->fieldName = "kasse";
$this->kasseId->aliasFieldName = "abrechnung_journal_kasse";
$this->kasseId->label = "Kasse";
$this->kasseId->allowNullValue = true;

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
}