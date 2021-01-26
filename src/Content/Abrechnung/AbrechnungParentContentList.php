<?php


namespace Nemundo\Abrechnung\Content\Abrechnung;


use Nemundo\Abrechnung\Data\Abrechnung\AbrechnungReader;
use Nemundo\Abrechnung\Data\AbrechnungIndex\AbrechnungIndexReader;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Index\Tree\Type\AbstractParentContentList;
use Nemundo\Content\View\AbstractContentList;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class AbrechnungParentContentList extends AbstractContentList  //ParentContentList
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $reader = new AbrechnungReader();  // new AbrechnungIndexReader();
        //$reader->model->loadContent();
        //$reader->model->content->loadContentType();
        //$reader->filter->andEqual($reader->model->parentId, $this->parentId);
        $reader->addOrder($reader->model->abrechnung);

        $header = new TableHeader($table);
        $header->addText($reader->model->abrechnung->label);

        foreach ($reader->getData() as $indexRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($indexRow->abrechnung);

            //$contentType = $indexRow->content->getContentType();
            //$row->addClickableSite($contentType->getViewSite());

        }

        return parent::getContent();

    }

}