<?php

namespace Nemundo\Abrechnung\Page;


use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Abrechnung\Parameter\JournalParameter;

use Nemundo\Abrechnung\Template\AbrechnungTemplate;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;

class JournalViewPage extends AbrechnungTemplate
{

    public function getContent()
    {

        $journalId = (new JournalParameter())->getValue();

        $journalReader = new JournalReader();
        $journalReader->model->loadUserCreated();
        $journalReader->model->loadUserModified();
        $journalRow = $journalReader->getRowById($journalId);

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Datum', $journalRow->datum->getShortDateLeadingZeroFormat());
        $table->addLabelValue('Text', $journalRow->text);
        $table->addLabelValue('Betrag', $journalRow->betrag);
        $table->addLabelValue('Erstellung', $journalRow->dateTimeCreated->getShortDateTimeWithSecondLeadingZeroFormat());
        $table->addLabelValue('', $journalRow->userCreated->login);
        $table->addLabelValue('Letzte Änderung', $journalRow->dateTimeModified->getShortDateTimeWithSecondLeadingZeroFormat());
        $table->addLabelValue('', $journalRow->userModified->login);

        return parent::getContent();

    }

}