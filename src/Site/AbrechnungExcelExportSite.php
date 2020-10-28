<?php

namespace Nemundo\Abrechnung\Site;

use Nemundo\Abrechnung\Berechnung\KasseBetrag;
use Nemundo\Abrechnung\Berechnung\TotalBetrag;
use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Data\Journal\JournalReader;
use Nemundo\Abrechnung\Data\Kasse\KasseReader;
use Nemundo\Abrechnung\Parameter\AbrechnungParameter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Office\Excel\Document\ExcelDocument;
use Nemundo\Package\FontAwesome\IconSite\AbstractExcelSite;


class AbrechnungExcelExportSite extends AbstractExcelSite
{

    /**
     * @var AbrechnungExcelExportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Excel Export';
        $this->url = 'excel-export';

        AbrechnungExcelExportSite::$site = $this;
    }


    public function loadContent()
    {

        $abrechnungId = (new AbrechnungParameter())->getValue();
        $abrechnungRow = (new AbrechnungReader())->getRowById($abrechnungId);

        $excel = new ExcelDocument();
        $excel->filename = $abrechnungRow->abrechnung . '.xlsx';

        $data = [];
        $data[] = $abrechnungRow->abrechnung;
        $excel->addRow($data, true);
        $excel->addRow([]);

        $header = [];
        $header[] = 'Beleg Nr.';
        $header[] = 'Datum';
        $header[] = 'Text';
        $header[] = 'Betrag';
        $header[] = 'Bezahlt von';
        $excel->addRow($header);

        $reader = new JournalReader();
        $reader->model->loadKasse();
        $reader->filter->andEqual($reader->model->abrechnungId, $abrechnungId);
        $reader->addOrder($reader->model->beleg, SortOrder::DESCENDING);
        $reader->addOrder($reader->model->belegNr);
        $reader->addOrder($reader->model->datum);

        foreach ($reader->getData() as $journalRow) {
            $data = [];

            if ($journalRow->beleg) {
                $data[] = $journalRow->belegNr;
            } else {
                $data[] = '';
            }

            $data[] = $journalRow->datum->getShortDateLeadingZeroFormat();
            $data[] = $journalRow->text;
            $data[] = $journalRow->betrag;
            $data[] = $journalRow->kasse->kasse;

            $excel->addRow($data);
        }

        $data = [];
        $data[] = '';
        $data[] = 'Total';
        $data[] = (new TotalBetrag())->getTotal($abrechnungId);
        $excel->addRow($data, true);


        $excel->addEmptyRow();
        $excel->addRow(['Kontostand'], true);

        $reader = new KasseReader();
        foreach ($reader->getData() as $kasseRow) {
            $data = [];
            $data[] = $kasseRow->kasse;
            $data[] = ((new KasseBetrag($abrechnungId))->getTotal($kasseRow->id));
            $data[] = $kasseRow->iban;
            $excel->addRow($data);
        }

        $excel->render();

    }

}