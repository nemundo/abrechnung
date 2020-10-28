<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
$this->model = new AbrechnungModel();
}
}