<?php


namespace Nemundo\Abrechnung\Template;


use Nemundo\Abrechnung\Com\Navigation\AbrechnungNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;

class AbrechnungTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();
        new AbrechnungNavigation($this);

    }

}