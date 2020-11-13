<?php

namespace Nemundo\Abrechnung\Install;

use Nemundo\Abrechnung\Application\AbrechnungApplication;
use Nemundo\Abrechnung\Content\Abrechnung\AbrechnungContentType;
use Nemundo\Abrechnung\Data\AbrechnungModelCollection;
use Nemundo\Abrechnung\Usergroup\AbrechnungUsergroup;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Group\User\UsergroupContentType;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\User\Setup\UsergroupSetup;

class AbrechnungInstall extends AbstractInstall
{
    public function install()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new AbrechnungApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new AbrechnungModelCollection());

        $setup = new UsergroupSetup();
        $setup->application = new AbrechnungApplication();
        $setup->addUsergroup(new AbrechnungUsergroup());

        $usergroup = new AbrechnungUsergroup();
        $type = new UsergroupContentType($usergroup->usergroupId);
        $type->saveType();

        $setup = new ScriptSetup();
        $setup->addScript(new AbrechnungClean());

        (new ContentTypeSetup(new AbrechnungApplication()))
            ->addContentType(new AbrechnungContentType());


    }

}