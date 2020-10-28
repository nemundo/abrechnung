<?php
namespace Nemundo\Abrechnung\Data\Kasse;
use Nemundo\Model\Site\AbstractModelAdminSite;
class KasseAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var KasseModel
*/
public $model;

protected function loadSite() {
$this->model = new KasseModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}