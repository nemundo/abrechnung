<?php

namespace Nemundo\Abrechnung\Content\Abrechnung;

use Nemundo\Abrechnung\Data\Abrechnung\Abrechnung;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow;
use Nemundo\Abrechnung\Data\AbrechnungIndex\AbrechnungIndex;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Site\JournalSite;
use Nemundo\Content\Index\Group\Type\GroupTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

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
        $this->listClass = AbrechnungContentList::class;
        $this->viewSite = JournalSite::$site;
        $this->parameterClass = AbrechnungParameter::class;

    }

    protected function onCreate()
    {

        $data = new Abrechnung();
        $data->abrechnung = $this->abrechnung;
        $data->groupId = $this->groupId;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }


    protected function onIndex()
    {

        $abrechnungRow = $this->getDataRow();

        $data = new AbrechnungIndex();
        $data->contentId = $this->getContentId();
        $data->parentId = $this->getParentId();
        $data->abrechnung = $abrechnungRow->abrechnung;
        $data->save();

        $this->addSearchText($abrechnungRow->abrechnung);

    }


    protected function onDataRow()
    {
        $this->dataRow = (new AbrechnungReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|AbrechnungRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->abrechnung;
    }


    public function getText()
    {
        return 'beschreibung zur abrechnung';
    }

}