<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
class AbrechnungIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AbrechnungIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
}