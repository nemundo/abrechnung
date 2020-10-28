<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Data\Journal\JournalDelete;
use Nemundo\Abrechnung\Parameter\JournalParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;


class JournalDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var JournalDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Journal löschen';
        $this->url = 'journal-delete';

        JournalDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        (new JournalDelete())->deleteById((new JournalParameter())->getValue());
        (new UrlReferer())->redirect();

    }

}