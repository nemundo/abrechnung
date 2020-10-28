<?php
namespace Nemundo\Abrechnung\Data\Kasse;
use Nemundo\Model\Id\AbstractModelIdValue;
class KasseId extends AbstractModelIdValue {
/**
* @var KasseModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KasseModel();
}
}