<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  KasseModel();
}
}