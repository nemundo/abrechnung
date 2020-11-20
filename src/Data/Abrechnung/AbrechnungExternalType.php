<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $abrechnung;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AbrechnungModel::class;
$this->externalTableName = "abrechnung_abrechnung";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->abrechnung = new \Nemundo\Model\Type\Text\TextType();
$this->abrechnung->fieldName = "abrechnung";
$this->abrechnung->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->abrechnung->aliasFieldName = $this->abrechnung->tableName . "_" . $this->abrechnung->fieldName;
$this->abrechnung->label = "Abrechnung";
$this->addType($this->abrechnung);

}
}