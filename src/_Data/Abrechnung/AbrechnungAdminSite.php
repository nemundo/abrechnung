<?php
namespace Nemundo\Abrechnung\Data\Abrechnung;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AbrechnungAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AbrechnungModel
*/
public $model;

protected function loadSite() {
$this->model = new AbrechnungModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}