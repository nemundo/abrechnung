<?php

namespace Nemundo\Abrechnung\Page;

use Nemundo\Abrechnung\Com\Form\JournalForm;
use Nemundo\Abrechnung\Com\Table\JournalTable;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Site\AbrechnungExcelExportSite;
use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class JournalPage extends AbrechnungTemplate
{

    public function getContent()
    {

        $abrechnungParameter = new AbrechnungParameter();
        $abrechnungId = $abrechnungParameter->getValue();
        $abrechnungRow = (new AbrechnungReader())->getRowById($abrechnungParameter->getValue());

        $title = new AdminTitle($this);
        $title->content = $abrechnungRow->abrechnung;

        $btn = new AdminSiteButton($this);
        $btn->site = clone(AbrechnungExcelExportSite::$site);
        $btn->site->addParameter($abrechnungParameter);

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'Journal';

        $table = new JournalTable($widget);
        $table->abrechnungId = $abrechnungId;


        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Neuer Journal Eintrag';

        $form = new JournalForm($widget);
        $form->abrechnungId = $abrechnungId;


        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Kontostand';

        /*$table = new KontostandTable($widget);
        $table->abrechnungId = $abrechnungId;*/

        return parent::getContent();

    }

}