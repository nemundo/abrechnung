<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $parentContentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parentContent;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $abrechnungId;

/**
* @var \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungExternalType
*/
public $abrechnung;

protected function loadModel() {
$this->tableName = "abrechnung_abrechnung_index";
$this->aliasTableName = "abrechnung_abrechnung_index";
$this->label = "Abrechnung Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "abrechnung_abrechnung_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "abrechnung_abrechnung_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->parentContentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->parentContentId->tableName = "abrechnung_abrechnung_index";
$this->parentContentId->fieldName = "parent_content";
$this->parentContentId->aliasFieldName = "abrechnung_abrechnung_index_parent_content";
$this->parentContentId->label = "Parent Content";
$this->parentContentId->allowNullValue = true;

$this->abrechnungId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->abrechnungId->tableName = "abrechnung_abrechnung_index";
$this->abrechnungId->fieldName = "abrechnung";
$this->abrechnungId->aliasFieldName = "abrechnung_abrechnung_index_abrechnung";
$this->abrechnungId->label = "Abrechnung";
$this->abrechnungId->allowNullValue = true;

}
public function loadParentContent() {
if ($this->parentContent == null) {
$this->parentContent = new \Nemundo\Content\Data\Content\ContentExternalType($this, "abrechnung_abrechnung_index_parent_content");
$this->parentContent->tableName = "abrechnung_abrechnung_index";
$this->parentContent->fieldName = "parent_content";
$this->parentContent->aliasFieldName = "abrechnung_abrechnung_index_parent_content";
$this->parentContent->label = "Parent Content";
}
return $this;
}
public function loadAbrechnung() {
if ($this->abrechnung == null) {
$this->abrechnung = new \Nemundo\Abrechnung\Data\Abrechnung\AbrechnungExternalType($this, "abrechnung_abrechnung_index_abrechnung");
$this->abrechnung->tableName = "abrechnung_abrechnung_index";
$this->abrechnung->fieldName = "abrechnung";
$this->abrechnung->aliasFieldName = "abrechnung_abrechnung_index_abrechnung";
$this->abrechnung->label = "Abrechnung";
}
return $this;
}
}