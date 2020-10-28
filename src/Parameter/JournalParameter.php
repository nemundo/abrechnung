<?php
namespace Nemundo\Abrechnung\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class JournalParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'journal';
}
}