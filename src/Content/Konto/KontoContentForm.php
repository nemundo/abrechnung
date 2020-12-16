<?php

namespace Nemundo\Abrechnung\Content\Konto;

use Nemundo\Abrechnung\Data\Konto\KontoModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class KontoContentForm extends AbstractContentForm
{
    /**
     * @var KontoContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $konto;

    /**
     * @var BootstrapTextBox
     */
    private $iban;


    public function getContent()
    {

        $model = new KontoModel();

        $this->konto = new BootstrapTextBox($this);
        $this->konto->label = $model->konto->label;
        $this->konto->validation = true;

        $this->iban = new BootstrapTextBox($this);
        $this->iban->label = $model->iban->label;

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $kontoRow = $this->contentType->getDataRow();
        $this->konto->value = $kontoRow->konto;
        $this->iban->value = $kontoRow->iban;

    }


    public function onSubmit()
    {

        $this->contentType->konto = $this->konto->getValue();
        $this->contentType->iban = $this->iban->getValue();
        $this->contentType->saveType();

    }
}