<?php

namespace Nemundo\Abrechnung\Application;


use Nemundo\App\Application\Type\AbstractApplication;

class AbrechnungApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Abrechnung';
        $this->applicationId = 'f3b39def-a194-48c6-b1c9-de92867540d6';
    }

}