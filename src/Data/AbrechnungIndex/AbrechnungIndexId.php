<?php
namespace Nemundo\Abrechnung\Data\AbrechnungIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class AbrechnungIndexId extends AbstractModelIdValue {
/**
* @var AbrechnungIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungIndexModel();
}
}