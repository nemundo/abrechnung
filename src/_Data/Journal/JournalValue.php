<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var JournalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
}
}