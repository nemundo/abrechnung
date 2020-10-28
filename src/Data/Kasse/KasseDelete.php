<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KasseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
}