<?php
namespace Nemundo\Abrechnung\Data\Kasse;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class KasseTable extends BootstrapModelTable {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
$this->model = new KasseModel();
}
}