<?php

namespace Nemundo\Abrechnung\Com\Form;


use Nemundo\Abrechnung\Com\ListBox\KontoListBox;
use Nemundo\Abrechnung\Data\Journal\Journal;
use Nemundo\Abrechnung\Data\Journal\JournalModel;
use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Abrechnung\Data\Journal\JournalUpdate;
use Nemundo\Abrechnung\Data\Journal\JournalValue;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Db\Sql\Field\Aggregate\MaxField;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class JournalForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $abrechnungId;

    /**
     * @var string
     */
    public $journalId;

    /**
     * @var BootstrapDatePicker
     */
    private $datum;

    /**
     * @var BootstrapTextBox
     */
    private $text;

    /**
     * @var BootstrapTextBox
     */
    private $betrag;

    /**
     * @var KontoListBox
     */
    private $konto;

    /**
     * @var BootstrapCheckBox
     */
    private $beleg;

    /**
     * @var BootstrapFileUpload
     */
    private $belegBild;

    public function getContent()
    {

        $model = new JournalModel();

        $this->datum = new BootstrapDatePicker($this);
        $this->datum->label = 'Datum';
        $this->datum->validation = true;
        $this->datum->value = (new Date())->setNow()->getShortDateLeadingZeroFormat();

        $this->text = new BootstrapTextBox($this);
        $this->text->label = 'Text';
        $this->text->validation = true;

        $this->betrag = new BootstrapTextBox($this);
        $this->betrag->label = 'Betrag';
        $this->betrag->validation = true;
        $this->betrag->validationType = ValidationType::IS_NUMBER;

        $this->konto = new KontoListBox($this);
        $this->konto->label = 'Bezahlt von';

        $this->beleg = new BootstrapCheckBox($this);
        $this->beleg->label = 'Beleg';

        $this->belegBild = new BootstrapFileUpload($this);
        $this->belegBild->label = $model->belegBild->label;

        $this->text->value = 'test123';
        $this->betrag->value = '123';


        if ($this->journalId !== null) {

            $journalRow = (new JournalReader())->getRowById($this->journalId);

            $this->datum->value = $journalRow->datum->getShortDateLeadingZeroFormat();
            $this->text->value = $journalRow->text;
            $this->betrag->value = $journalRow->betrag;
            $this->beleg->value = $journalRow->beleg;
            $this->konto->value = $journalRow->kontoId;

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $beleg = $this->beleg->getValue();

        if ($this->journalId == null) {

            $data = new Journal();
            $data->abrechnungId = $this->abrechnungId;




            $data->datum->fromGermanFormat($this->datum->getValue());
            $data->text = $this->text->getValue();
            $data->betrag = $this->betrag->getValue();
            $data->kontoId = $this->konto->getValue();

            if ($this->belegBild->hasValue()) {
                $beleg = true;
                $data->belegBild->fromFileRequest($this->belegBild->getFileRequest());
            }

            if ($beleg) {
                $data->beleg = true;
                $data->belegNr = $this->getBelegNr();
            }

            $data->save();

        } else {

            $journalRow = (new JournalReader())->getRowById($this->journalId);

            $update = new JournalUpdate();
            $update->datum->fromGermanFormat($this->datum->getValue());
            $update->text = $this->text->getValue();
            $update->betrag = $this->betrag->getValue();
            $update->kontoId = $this->konto->getValue();
            //$update->beleg = $this->beleg->getValue();

            /*if (($beleg) && (!$journalRow->beleg)) {
                $update->belegNr = $this->getBelegNr();
            }*/

            $update->updateById($this->journalId);

        }

    }


    private function getBelegNr()
    {

        $value = new JournalValue();
        $value->filter->andEqual($value->model->abrechnungId, $this->abrechnungId);
        $value->filter->andEqual($value->model->beleg, true);

        $max = new MaxField();
        $max->aggregateField = $value->model->belegNr;

        $value->field = $max;

        $belegNr = $value->getValue();

        //(new Debug())->write($this->abrechnungId);
        //(new Debug())->write($belegNr);

        if ($belegNr == '') {
            $belegNr = 0;
        }

        /*
        if (!(new NumberValidation())->isNumber($belegNr)) {
            (new Debug())->write($belegNr);
            exit;
        }*/

        $belegNr = $belegNr + 1;

        return $belegNr;

    }

}