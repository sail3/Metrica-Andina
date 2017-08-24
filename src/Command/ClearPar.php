<?php
namespace Application\Command;
/**
 * Clase ClearPar.
 */
class ClearPar
{
  const PARENT_OPEN = '(';
  const PARENT_CLOSE = ')';

  public function build($param)
  {
    $arrayValues = str_split($param);
    $returnValues = [];
    for ($index=1; $index < count($arrayValues); $index++) {
      if ($arrayValues[$index] == self::PARENT_CLOSE && $arrayValues[$index -1] == self::PARENT_OPEN) {
        $returnValues[] = $arrayValues[$index -1];
        $returnValues[] = $arrayValues[$index];
      }
    }
    return implode($returnValues);
  }
}
