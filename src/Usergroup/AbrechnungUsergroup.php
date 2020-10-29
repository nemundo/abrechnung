<?php

namespace Nemundo\Abrechnung\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class AbrechnungUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Abrechnung';
        $this->usergroupId = 'f3cb32fd-2caf-492e-8af0-102bd88d4356';
    }
}