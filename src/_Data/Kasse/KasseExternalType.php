<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $kasse;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $iban;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KasseModel::class;
$this->externalTableName = "abrechnung_kasse";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->kasse = new \Nemundo\Model\Type\Text\TextType();
$this->kasse->fieldName = "kasse";
$this->kasse->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kasse->aliasFieldName = $this->kasse->tableName . "_" . $this->kasse->fieldName;
$this->kasse->label = "Konto";
$this->addType($this->kasse);

$this->iban = new \Nemundo\Model\Type\Text\TextType();
$this->iban->fieldName = "iban";
$this->iban->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->iban->aliasFieldName = $this->iban->tableName . "_" . $this->iban->fieldName;
$this->iban->label = "IBAN";
$this->addType($this->iban);

}
}