<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Page\JournalEditPage;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class JournalEditSite extends AbstractEditIconSite
{

    /**
     * @var JournalEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Journal editieren';
        $this->url = 'journal-edit';

        JournalEditSite::$site = $this;
    }

    public function loadContent()
    {
        (new JournalEditPage())->render();
    }
}