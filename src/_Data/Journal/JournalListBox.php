<?php
namespace Nemundo\Abrechnung\Data\Journal;
class JournalListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var JournalModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new JournalModel();
$this->label = $this->model->label;
}
}