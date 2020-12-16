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
* @var \Nemundo\Model\Type\File\ImageType
*/
public $belegBild;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $kontoId;

/**
* @var \Nemundo\Abrechnung\Data\Konto\KontoExternalType
*/
public $konto;

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

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

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

$this->betrag = new \Nemundo\Model\Type\Number\DecimalNumberType();
$this->betrag->fieldName = "betrag";
$this->betrag->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->betrag->aliasFieldName = $this->betrag->tableName . "_" . $this->betrag->fieldName;
$this->betrag->label = "Betrag";
$this->addType($this->betrag);

$this->belegBild = new \Nemundo\Model\Type\File\ImageType();
$this->belegBild->fieldName = "beleg_bild";
$this->belegBild->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->belegBild->aliasFieldName = $this->belegBild->tableName . "_" . $this->belegBild->fieldName;
$this->belegBild->label = "Beleg Bild";
$this->addType($this->belegBild);

$this->kontoId = new \Nemundo\Model\Type\Id\IdType();
$this->kontoId->fieldName = "konto";
$this->kontoId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kontoId->aliasFieldName = $this->kontoId->tableName ."_".$this->kontoId->fieldName;
$this->kontoId->label = "Konto";
$this->addType($this->kontoId);

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
public function loadKonto() {
if ($this->konto == null) {
$this->konto = new \Nemundo\Abrechnung\Data\Konto\KontoExternalType(null, $this->parentFieldName . "_konto");
$this->konto->fieldName = "konto";
$this->konto->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->konto->aliasFieldName = $this->konto->tableName ."_".$this->konto->fieldName;
$this->konto->label = "Konto";
$this->addType($this->konto);
}
return $this;
}
}