<?php
namespace Nemundo\Abrechnung\Data\Journal;
use Nemundo\Model\Id\AbstractModelIdValue;
class JournalId extends AbstractModelIdValue {
/**
* @var JournalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new JournalModel();
}
}