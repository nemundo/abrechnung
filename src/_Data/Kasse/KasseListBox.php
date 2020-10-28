<?php
namespace Nemundo\Abrechnung\Data\Kasse;
class KasseListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new KasseModel();
$this->label = $this->model->label;
}
}