<?php


namespace Nemundo\Abrechnung\Content\Abrechnung;


use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Content\Form\AbstractContentSearchForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class AbrechnungContentSearchForm extends AbstractContentSearchForm
{

    /**
     * @var BootstrapListBox
     */
    private $abrechnung;

    public function getContent()
    {

        $this->abrechnung = new BootstrapListBox($this);
        $this->abrechnung->label = 'Abrechnung';
        $this->abrechnung->validation = true;

        $reader = new AbrechnungReader();
        $reader->addOrder($reader->model->abrechnung);
        foreach ($reader->getData() as $abrechnungRow) {
            $this->abrechnung->addItem($abrechnungRow->id, $abrechnungRow->abrechnung);
        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $contentType = new AbrechnungContentType($this->abrechnung->getValue());
        $this->saveTree($contentType);

    }

}