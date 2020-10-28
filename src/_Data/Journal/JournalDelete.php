<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var JournalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
}
}