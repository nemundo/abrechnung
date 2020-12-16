<?php

namespace Nemundo\Abrechnung\Page;

use Nemundo\Abrechnung\Content\Konto\KontoContentType;
use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class KontoPage extends AbrechnungTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        (new KontoContentType())->getAdmin($layout->col1);

        return parent::getContent();

    }

}