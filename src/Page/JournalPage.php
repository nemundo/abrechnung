<?php

namespace Nemundo\Abrechnung\Page;

use Nemundo\Abrechnung\Com\Container\BelegContainer;
use Nemundo\Abrechnung\Com\Form\JournalForm;
use Nemundo\Abrechnung\Com\Table\JournalTable;
use Nemundo\Abrechnung\Com\Table\KontostandTable;
use Nemundo\Abrechnung\Content\Abrechnung\AbrechnungContentType;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Parameter\JournalParameter;
use Nemundo\Abrechnung\Site\AbrechnungExcelExportSite;
use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\Site;

class JournalPage extends AbrechnungTemplate
{

    public function getContent()
    {

        $abrechnungParameter = new AbrechnungParameter();
        $abrechnungId = $abrechnungParameter->getValue();

        $abrechnungContentType = (new AbrechnungContentType($abrechnungParameter->getValue()));

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
        $table->abrechnungContentType = $abrechnungContentType;

        $container = new BelegContainer($layout->col1);
        $container->abrechnungContentType = $abrechnungContentType;

        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Neuer Journal Eintrag';

        $form = new JournalForm($widget);
        $form->abrechnungId = $abrechnungId;

        $journalParameter = new JournalParameter();
        if ($journalParameter->hasValue()) {
            $form->journalId = $journalParameter->getValue();
        }

        $form->redirectSite = new Site();
        $form->redirectSite->removeParameter(new JournalParameter());


        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Kontostand';

        $table =new KontostandTable($widget);
        $table->abrechnungId = $abrechnungId;

        return parent::getContent();

    }

}