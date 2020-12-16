<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $konto;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $iban;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KontoModel::class;
$this->externalTableName = "abrechnung_konto";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->konto = new \Nemundo\Model\Type\Text\TextType();
$this->konto->fieldName = "konto";
$this->konto->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->konto->aliasFieldName = $this->konto->tableName . "_" . $this->konto->fieldName;
$this->konto->label = "Konto";
$this->addType($this->konto);

$this->iban = new \Nemundo\Model\Type\Text\TextType();
$this->iban->fieldName = "iban";
$this->iban->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->iban->aliasFieldName = $this->iban->tableName . "_" . $this->iban->fieldName;
$this->iban->label = "IBAN";
$this->addType($this->iban);

}
}