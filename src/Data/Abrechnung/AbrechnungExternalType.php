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

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $groupId;

/**
* @var \Nemundo\Content\Index\Group\Data\Group\GroupExternalType
*/
public $group;

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

$this->groupId = new \Nemundo\Model\Type\Id\IdType();
$this->groupId->fieldName = "group";
$this->groupId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->groupId->aliasFieldName = $this->groupId->tableName ."_".$this->groupId->fieldName;
$this->groupId->label = "Group";
$this->addType($this->groupId);

}
public function loadGroup() {
if ($this->group == null) {
$this->group = new \Nemundo\Content\Index\Group\Data\Group\GroupExternalType(null, $this->parentFieldName . "_group");
$this->group->fieldName = "group";
$this->group->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->group->aliasFieldName = $this->group->tableName ."_".$this->group->fieldName;
$this->group->label = "Group";
$this->addType($this->group);
}
return $this;
}
}