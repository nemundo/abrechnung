<?php

namespace Nemundo\Abrechnung\Page;

use Nemundo\Abrechnung\Com\Form\JournalForm;
use Nemundo\Abrechnung\Com\Navigation\AbrechnungNavigation;
use Nemundo\Abrechnung\Layout\AbrechnungLayout;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Parameter\JournalParameter;
use Nemundo\Abrechnung\Site\JournalSite;
use App\Template\AppTemplate;
use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class JournalEditPage extends AbrechnungTemplate
{

    public function getContent()
    {



        //new AbrechnungNavigation($this);

        //$layout = new BootstrapTwoColumnLayout($this);


        $layout = new AbrechnungLayout($this);

        $widget = new AdminWidget($layout);
$widget->widgetTitle = 'Journal editieren';

        $form = new JournalForm($widget);
        $form->abrechnungId = (new AbrechnungParameter())->getValue();
        $form->journalId = (new JournalParameter())->getValue();
        $form->redirectSite = JournalSite::$site;
        $form->redirectSite->addParameter(new AbrechnungParameter());


        return parent::getContent();

    }

}