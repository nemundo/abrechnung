<?php

namespace Nemundo\Abrechnung\Com\Navigation;


use Nemundo\Abrechnung\Site\AbrechnungSite;
use Nemundo\Admin\Com\Navigation\AdminNavigation;

class AbrechnungNavigation extends AdminNavigation
{

    public function getContent()
    {
        $this->site = AbrechnungSite::$site;
        return parent::getContent();
    }

}