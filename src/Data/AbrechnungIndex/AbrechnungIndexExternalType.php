<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $parentContentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parentContent;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $abrechnungId;

/**
* @var \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungExternalType
*/
public $abrechnung;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AbrechnungIndexModel::class;
$this->externalTableName = "abrechnung_abrechnung_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->parentContentId = new \Nemundo\Model\Type\Id\IdType();
$this->parentContentId->fieldName = "parent_content";
$this->parentContentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parentContentId->aliasFieldName = $this->parentContentId->tableName ."_".$this->parentContentId->fieldName;
$this->parentContentId->label = "Parent Content";
$this->addType($this->parentContentId);

$this->abrechnungId = new \Nemundo\Model\Type\Id\IdType();
$this->abrechnungId->fieldName = "abrechnung";
$this->abrechnungId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->abrechnungId->aliasFieldName = $this->abrechnungId->tableName ."_".$this->abrechnungId->fieldName;
$this->abrechnungId->label = "Abrechnung";
$this->addType($this->abrechnungId);

}
public function loadParentContent() {
if ($this->parentContent == null) {
$this->parentContent = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_parent_content");
$this->parentContent->fieldName = "parent_content";
$this->parentContent->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->parentContent->aliasFieldName = $this->parentContent->tableName ."_".$this->parentContent->fieldName;
$this->parentContent->label = "Parent Content";
$this->addType($this->parentContent);
}
return $this;
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
}