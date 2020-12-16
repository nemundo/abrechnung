<?php


namespace Nemundo\Abrechnung\Content\Konto;


use Nemundo\Abrechnung\Data\Konto\KontoPaginationReader;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class KontoContentAdmin extends AbstractContentAdmin
{

    protected function loadIndex()
    {

        $reader=new KontoPaginationReader();
        $reader->addOrder($reader->model->konto);

        $table=new AdminClickableTable($this);

        $header=new TableHeader($table);
        $header->addText($reader->model->konto->label);
        $header->addText($reader->model->iban->label);
        $header->addEmpty();
        $header->addEmpty();

        foreach ($reader->getData() as $kontoRow) {

            $row=new TableRow($table);
            $row->addText($kontoRow->konto);
            $row->addText($kontoRow->iban);

            $row->addIconSite($this->getEditSite($kontoRow->id));
            $row->addIconSite($this->getDeleteSite($kontoRow->id));

        }

        $pagination=new BootstrapPagination($this);
        $pagination->paginationReader=$reader;

    }

}