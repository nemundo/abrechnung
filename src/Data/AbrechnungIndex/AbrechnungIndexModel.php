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
public $parentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parent;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\TextType
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

$this->parentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->parentId->tableName = "abrechnung_abrechnung_index";
$this->parentId->fieldName = "parent";
$this->parentId->aliasFieldName = "abrechnung_abrechnung_index_parent";
$this->parentId->label = "Parent";
$this->parentId->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "abrechnung_abrechnung_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "abrechnung_abrechnung_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->abrechnung = new \Nemundo\Model\Type\Text\TextType($this);
$this->abrechnung->tableName = "abrechnung_abrechnung_index";
$this->abrechnung->fieldName = "abrechnung";
$this->abrechnung->aliasFieldName = "abrechnung_abrechnung_index_abrechnung";
$this->abrechnung->label = "Abrechnung";
$this->abrechnung->allowNullValue = true;
$this->abrechnung->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "parent";
$index->addType($this->parentId);

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType($this, "abrechnung_abrechnung_index_parent");
$this->parent->tableName = "abrechnung_abrechnung_index";
$this->parent->fieldName = "parent";
$this->parent->aliasFieldName = "abrechnung_abrechnung_index_parent";
$this->parent->label = "Parent";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "abrechnung_abrechnung_index_content");
$this->content->tableName = "abrechnung_abrechnung_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "abrechnung_abrechnung_index_content";
$this->content->label = "Content";
}
return $this;
}
}