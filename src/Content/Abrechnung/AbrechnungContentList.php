<?php


namespace Nemundo\Abrechnung\Content\Abrechnung;


use Nemundo\Abrechnung\Data\AbrechnungIndex\AbrechnungIndexReader;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Index\Tree\Type\AbstractContentList;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class AbrechnungContentList extends AbstractContentList
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $reader = new AbrechnungIndexReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->filter->andEqual($reader->model->parentId, $this->parentId);
        $reader->addOrder($reader->model->abrechnung);

        $header = new TableHeader($table);
        $header->addText($reader->model->abrechnung->label);

        foreach ($reader->getData() as $indexRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($indexRow->abrechnung);

            $contentType = $indexRow->content->getContentType();
            $row->addClickableSite($contentType->getViewSite());

        }

        return parent::getContent();

    }

}