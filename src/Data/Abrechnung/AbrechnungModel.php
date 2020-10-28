<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $abrechnung;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $groupId;

/**
* @var \Nemundo\Content\Index\Group\Data\Group\GroupExternalType
*/
public $group;

protected function loadModel() {
$this->tableName = "abrechnung_abrechnung";
$this->aliasTableName = "abrechnung_abrechnung";
$this->label = "Abrechnung";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "abrechnung_abrechnung";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "abrechnung_abrechnung_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->abrechnung = new \Nemundo\Model\Type\Text\TextType($this);
$this->abrechnung->tableName = "abrechnung_abrechnung";
$this->abrechnung->fieldName = "abrechnung";
$this->abrechnung->aliasFieldName = "abrechnung_abrechnung_abrechnung";
$this->abrechnung->label = "Abrechnung";
$this->abrechnung->allowNullValue = true;
$this->abrechnung->length = 255;

$this->groupId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->groupId->tableName = "abrechnung_abrechnung";
$this->groupId->fieldName = "group";
$this->groupId->aliasFieldName = "abrechnung_abrechnung_group";
$this->groupId->label = "Group";
$this->groupId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "group";
$index->addType($this->groupId);

}
public function loadGroup() {
if ($this->group == null) {
$this->group = new \Nemundo\Content\Index\Group\Data\Group\GroupExternalType($this, "abrechnung_abrechnung_group");
$this->group->tableName = "abrechnung_abrechnung";
$this->group->fieldName = "group";
$this->group->aliasFieldName = "abrechnung_abrechnung_group";
$this->group->label = "Group";
}
return $this;
}
}