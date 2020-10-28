<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
class AbrechnungListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AbrechnungModel();
$this->label = $this->model->label;
}
}