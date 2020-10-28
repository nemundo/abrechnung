<?php


namespace Nemundo\Abrechnung;


use Nemundo\Project\AbstractProject;

class AbrechnungProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Abrechnung';
        $this->projectName = 'abrechnung';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;

    }

}