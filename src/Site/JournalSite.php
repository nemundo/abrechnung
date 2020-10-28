<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Page\JournalPage;
use Nemundo\Web\Site\AbstractSite;

class JournalSite extends AbstractSite
{

    /**
     * @var JournalSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Journal';
        $this->url = 'journal';
        $this->menuActive = false;

        new JournalViewSite($this);
        new JournalEditSite($this);
        new JournalDeleteSite($this);
        
        JournalSite::$site = $this;
    }


    public function loadContent()
    {
        (new JournalPage())->render();
    }
}