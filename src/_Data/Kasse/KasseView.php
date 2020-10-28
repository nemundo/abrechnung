<?php
namespace Nemundo\Abrechnung\Data\Kasse;
use Nemundo\Model\View\ModelView;
class KasseView extends ModelView {
/**
* @var KasseModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new KasseModel();
}
}