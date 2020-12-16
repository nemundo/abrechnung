<?php

namespace Nemundo\Abrechnung\Content\Abrechnung;

use Nemundo\Abrechnung\Data\Abrechnung\Abrechnung;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungRow;
use Nemundo\Abrechnung\Data\AbrechnungIndex\AbrechnungIndex;
use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Abrechnung\Site\JournalSite;
use Nemundo\Content\App\Document\Index\DocumentGroupIndexTrait;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\Index\Group\Session\UserGroupSession;
use Nemundo\Content\Index\Group\Type\GroupTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Db\Sql\Order\SortOrder;

class AbrechnungContentType extends AbstractTreeContentType
{

    //use GroupTrait;
    //use DocumentGroupIndexTrait;

    public $abrechnung;

    protected function loadContentType()
    {

        $this->typeLabel = 'Abrechnung';
        $this->typeId = '406196b0-0308-4c8b-bb60-d57c945b702b';
        $this->formClassList[] = AbrechnungContentForm::class;
        $this->formClassList[]= ContentSearchForm::class;   //ear AbrechnungContentSearchForm::class;
        $this->viewClassList[] = AbrechnungContentView::class;

        $this->listClass = AbrechnungParentContentList::class;
        $this->viewSite = JournalSite::$site;
        $this->parameterClass = AbrechnungParameter::class;

        $this->restrictedChild=true;
        $this->addRestrictedContentType(new ImageContentType());

    }


    protected function onCreate()
    {

        /*if ($this->groupId == null) {
            $this->groupId =(new UserGroupSession())->getGroupId();
        }*/

        $data = new Abrechnung();
        $data->abrechnung = $this->abrechnung;
        //$data->groupId = $this->groupId;
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

        //$this->saveGroupDocumentIndex();

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


    public function getJournalReaderData() {

        $reader = new JournalReader();
        $reader->model->loadKonto();
        $reader->filter->andEqual($reader->model->abrechnungId, $this->dataId);
        $reader->addOrder($reader->model->beleg, SortOrder::DESCENDING);
        $reader->addOrder($reader->model->belegNr);
        $reader->addOrder($reader->model->datum);

        return $reader->getData();



    }

}