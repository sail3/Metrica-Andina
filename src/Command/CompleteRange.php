<?php
namespace Application\Command;
/**
 * Clase Complete Range
 */
class CompleteRange
{
  public function build($params = array())
  {
    $maxElement = $params[0];
    $minElement = $params[0];
    foreach ($params as $value) {
      if ($value < 1) {
        return "error: only accept positive values\n";
      }
      $maxElement = ($value > $maxElement) ? $value : $maxElement;
      $minElement = ($value < $minElement) ? $value : $minElement;
    }
    return range($minElement, $maxElement);
  }
}
