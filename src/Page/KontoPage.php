<?php

namespace Nemundo\Abrechnung\Page;

use Nemundo\Abrechnung\Berechnung\KasseBetrag;
use Nemundo\Abrechnung\Com\Navigation\AbrechnungNavigation;
use Nemundo\Abrechnung\Data\Kasse\KasseAdmin;
use Nemundo\Abrechnung\Data\Kasse\KasseReader;

use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class KontoPage extends AbrechnungTemplate
{

    public function getContent()
    {

        //new AbrechnungNavigation($this);



        $layout = new BootstrapTwoColumnLayout($this);

        /*
        $admin = new KasseAdmin($layout->col1);
        $admin->showDeleteButton = false;
        $admin->showViewButton = false;*/


        return parent::getContent();

    }

}