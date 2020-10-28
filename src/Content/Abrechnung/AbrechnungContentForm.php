<?php

namespace Nemundo\Abrechnung\Content\Abrechnung;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class AbrechnungContentForm extends AbstractContentForm
{
    /**
     * @var AbrechnungContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $abrechnung;


    public function getContent()
    {

        $this->abrechnung=new BootstrapTextBox($this);
        $this->abrechnung->label='Abrechnung';
        $this->abrechnung->validation=true;


        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->abrechnung=$this->abrechnung->getValue();
        $this->contentType->saveType();
    }
}