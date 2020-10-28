<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var JournalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
}
}