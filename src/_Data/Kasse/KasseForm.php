<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
$this->model = new KasseModel();
}
}