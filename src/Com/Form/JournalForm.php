<?php

namespace Nemundo\Abrechnung\Com\Form;


use Nemundo\Abrechnung\Data\Journal\Journal;
use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Abrechnung\Data\Journal\JournalUpdate;
use Nemundo\Abrechnung\Data\Journal\JournalValue;
use Nemundo\Abrechnung\Data\Kasse\KasseListBox;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Validation\NumberValidation;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Db\Sql\Field\Aggregate\MaxField;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
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
     * @var KasseListBox
     */
    private $kasse;

    /**
     * @var BootstrapCheckBox
     */
    private $beleg;

    public function getContent()
    {

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

        $this->kasse = new BootstrapListBox($this);  // new KasseListBox($this);
        $this->kasse->label = 'Bezahlt von';
        //$this->kasse->validation = true;

        $this->beleg = new BootstrapCheckBox($this);
        $this->beleg->label = 'Beleg';


        if ($this->journalId !== null) {

            $journalRow = (new JournalReader())->getRowById($this->journalId);

            $this->datum->value = $journalRow->datum->getShortDateLeadingZeroFormat();
            $this->text->value = $journalRow->text;
            $this->betrag->value = $journalRow->betrag;
            $this->beleg->value = $journalRow->beleg;
            $this->kasse->value = $journalRow->kasseId;

        }


        return parent::getContent();

    }


    protected function onSubmit()
    {

        if ($this->journalId == null) {

            $data = new Journal();
            $data->abrechnungId = $this->abrechnungId;

            $data->beleg = $this->beleg->getValue();

            if ($this->beleg->getValue()) {
                $data->belegNr = $this->getBelegNr();
            }

            $data->datum->fromGermanFormat($this->datum->getValue());
            $data->text = $this->text->getValue();
            $data->betrag = $this->betrag->getValue();
            $data->kasseId = $this->kasse->getValue();
            $data->save();

        } else {

            $journalRow = (new JournalReader())->getRowById($this->journalId);

            $update = new JournalUpdate();
            $update->datum->fromGermanFormat($this->datum->getValue());
            $update->text = $this->text->getValue();
            $update->betrag = $this->betrag->getValue();
            $update->kasseId = $this->kasse->getValue();
            $update->beleg = $this->beleg->getValue();

            if (($this->beleg->getValue()) && (!$journalRow->beleg)) {
                $update->belegNr = $this->getBelegNr();
            }

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