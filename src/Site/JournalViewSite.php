<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Page\JournalViewPage;
use Nemundo\Package\FontAwesome\Icon\ViewIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class JournalViewSite extends AbstractIconSite
{

    /**
     * @var JournalViewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'JournalView';
        $this->url = 'journal-view';
        $this->icon = new ViewIcon();

        JournalViewSite::$site = $this;
    }


    public function loadContent()
    {
        (new JournalViewPage())->render();
    }
}