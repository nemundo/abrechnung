<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Page\AbrechnungPage;
use Nemundo\Abrechnung\Usergroup\AbrechnungUsergroup;
use Nemundo\Web\Site\AbstractSite;

class AbrechnungSite extends AbstractSite
{

    /**
     * @var AbstractSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Abrechnung';
        $this->url = 'abrechnung';
        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new AbrechnungUsergroup());


        new JournalSite($this);
        new AbrechnungExcelExportSite($this);
        new KontoSite($this);

        AbrechnungSite::$site = $this;

    }


    public function loadContent()
    {
        (new AbrechnungPage())->render();
    }

}