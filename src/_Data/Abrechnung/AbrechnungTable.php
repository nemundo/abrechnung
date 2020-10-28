<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AbrechnungTable extends BootstrapModelTable {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadContainer() {
$this->model = new AbrechnungModel();
}
}