<?php

namespace Nemundo\Abrechnung\Content\Konto;

use Nemundo\Abrechnung\Data\Konto\Konto;
use Nemundo\Abrechnung\Data\Konto\KontoDelete;
use Nemundo\Abrechnung\Data\Konto\KontoReader;
use Nemundo\Abrechnung\Data\Konto\KontoRow;
use Nemundo\Abrechnung\Data\Konto\KontoUpdate;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class KontoContentType extends AbstractTreeContentType
{

    public $konto;

    public $iban;

    protected function loadContentType()
    {
        $this->typeLabel = 'Konto';
        $this->typeId = 'aca8376e-fa5f-458d-a70a-f2ff80a03a9d';
        $this->formClassList[] = KontoContentForm::class;
        $this->viewClassList[] = KontoContentView::class;
        $this->adminClass = KontoContentAdmin::class;
    }

    protected function onCreate()
    {

        $data = new Konto();
        $data->konto = $this->konto;
        $data->iban = $this->iban;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new KontoUpdate();
        $update->konto = $this->konto;
        $update->iban = $this->iban;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {
        (new KontoDelete())->deleteById($this->dataId);
    }


    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow = (new KontoReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|KontoRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}