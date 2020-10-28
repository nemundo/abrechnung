<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AbrechnungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
}