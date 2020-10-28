<?php

namespace Nemundo\Abrechnung\Install;


use Nemundo\Abrechnung\Data\AbrechnungCollection;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;

class AbrechnungClean extends AbstractConsoleScript
{

    protected function loadScript()
    {
   $this->scriptName = 'abrechnung-clean';
    }


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new AbrechnungCollection());

        (new AbrechnungInstall())->run();


    }

}