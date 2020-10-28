<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "abrechnung_kasse";
$this->aliasTableName = "abrechnung_kasse";
$this->label = "Konto";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "abrechnung_kasse";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "abrechnung_kasse_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->kasse = new \Nemundo\Model\Type\Text\TextType($this);
$this->kasse->tableName = "abrechnung_kasse";
$this->kasse->fieldName = "kasse";
$this->kasse->aliasFieldName = "abrechnung_kasse_kasse";
$this->kasse->label = "Konto";
$this->kasse->validation = true;
$this->kasse->allowNullValue = false;
$this->kasse->length = 255;

$this->iban = new \Nemundo\Model\Type\Text\TextType($this);
$this->iban->tableName = "abrechnung_kasse";
$this->iban->fieldName = "iban";
$this->iban->aliasFieldName = "abrechnung_kasse_iban";
$this->iban->label = "IBAN";
$this->iban->allowNullValue = false;
$this->iban->length = 255;

$this->addDefaultType($this->kasse);
$this->addDefaultOrderType($this->kasse);
}
}