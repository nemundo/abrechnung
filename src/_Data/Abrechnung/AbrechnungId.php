<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
use Nemundo\Model\Id\AbstractModelIdValue;
class AbrechnungId extends AbstractModelIdValue {
/**
* @var AbrechnungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AbrechnungModel();
}
}