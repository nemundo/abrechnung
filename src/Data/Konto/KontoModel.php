<?php
namespace Nemundo\Abrechnung\Data\Konto;
class KontoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "abrechnung_konto";
$this->aliasTableName = "abrechnung_konto";
$this->label = "Konto";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "abrechnung_konto";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "abrechnung_konto_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->konto = new \Nemundo\Model\Type\Text\TextType($this);
$this->konto->tableName = "abrechnung_konto";
$this->konto->fieldName = "konto";
$this->konto->aliasFieldName = "abrechnung_konto_konto";
$this->konto->label = "Konto";
$this->konto->allowNullValue = true;
$this->konto->length = 255;

$this->iban = new \Nemundo\Model\Type\Text\TextType($this);
$this->iban->tableName = "abrechnung_konto";
$this->iban->fieldName = "iban";
$this->iban->aliasFieldName = "abrechnung_konto_iban";
$this->iban->label = "IBAN";
$this->iban->allowNullValue = true;
$this->iban->length = 255;

}
}