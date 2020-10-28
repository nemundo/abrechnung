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
$this->abrechnung->validation = true;
$this->abrechnung->allowNullValue = false;
$this->abrechnung->length = 255;

}
}