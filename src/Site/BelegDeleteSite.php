<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Data\Journal\JournalDelete;
use Nemundo\Abrechnung\Data\Journal\JournalUpdate;
use Nemundo\Abrechnung\Parameter\JournalParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;


class BelegDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var BelegDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Beleg löschen';
        $this->url = 'beleg-delete';

        BelegDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        //(new JournalDelete())->deleteById((new JournalParameter())->getValue());

        $journalId=(new JournalParameter())->getValue();

        $update = new JournalUpdate();
        $update->beleg=false;
        $update->belegBild=null;
        $update->updateById($journalId);


        (new UrlReferer())->redirect();

    }

}