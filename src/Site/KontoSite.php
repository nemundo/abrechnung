<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Page\KontoPage;
use Nemundo\Web\Site\AbstractSite;

class KontoSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Konto';
        $this->url = 'konto';
    }

    public function loadContent()
    {
        (new KontoPage())->render();
    }
}