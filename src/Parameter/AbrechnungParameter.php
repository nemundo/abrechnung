<?php
namespace Nemundo\Abrechnung\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class AbrechnungParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'abrechnung';
}
}