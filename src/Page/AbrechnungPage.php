<?php

namespace Nemundo\Abrechnung\Page;


use Nemundo\Abrechnung\Com\Navigation\AbrechnungNavigation;
use Nemundo\Abrechnung\Content\Abrechnung\AbrechnungContentType;

use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Site\JournalSite;

use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Abrechnung\Usergroup\AbrechnungUsergroup;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Index\Group\Session\UserGroupSession;
use Nemundo\Content\Index\Group\User\GroupMembership;
use Nemundo\Content\Index\Group\User\UsergroupContentType;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class AbrechnungPage extends AbrechnungTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $abrechnungReader = new AbrechnungReader();
        //$abrechnungReader->model->loadGroup();

        /*
        foreach ((new GroupMembership())->getGroupIdList() as $groupId) {
            $abrechnungReader->filter->orEqual($abrechnungReader->model->groupId, $groupId);
        }*/

        $abrechnungReader->addOrder($abrechnungReader->model->abrechnung);

        foreach ($abrechnungReader->getData() as $abrechnungRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($abrechnungRow->abrechnung);
            //$row->addText($abrechnungRow->group->group);

            $site = clone(JournalSite::$site);
            $site->addParameter(new AbrechnungParameter($abrechnungRow->id));
            $row->addClickableSite($site);

        }


        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Neue Abrechnung';

        $type=new AbrechnungContentType();
        //$type->groupId = (new UserGroupSession())->getGroupId();
        //$type->groupId = (new UsergroupContentType((new AbrechnungUsergroup())->usergroupId))->getGroupId();
        $type->getDefaultForm($widget);

        return parent::getContent();

    }

}