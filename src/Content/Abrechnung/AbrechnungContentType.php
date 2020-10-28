<?php

namespace Nemundo\Abrechnung\Content\Abrechnung;

use Nemundo\Abrechnung\Data\Abrechnung\Abrechnung;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Site\JournalSite;
use Nemundo\Content\Index\Group\Type\GroupTrait;
use Nemundo\Content\Type\AbstractTreeContentType;

class AbrechnungContentType extends AbstractTreeContentType
{

    use GroupTrait;

    public $abrechnung;

    protected function loadContentType()
    {
        $this->typeLabel = 'Abrechnung';
        $this->typeId = '406196b0-0308-4c8b-bb60-d57c945b702b';
        $this->formClass = AbrechnungContentForm::class;
        $this->viewClass = AbrechnungContentView::class;
        $this->viewSite=JournalSite::$site;
        $this->parameterClass=AbrechnungParameter::class;

    }

    protected function onCreate()
    {

        $data=new Abrechnung();
        $data->abrechnung=$this->abrechnung;
        $data->groupId=$this->groupId;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow=(new AbrechnungReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|AbrechnungRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}