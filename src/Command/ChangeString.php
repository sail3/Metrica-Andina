<?php
namespace Application\Command;

/**
 * Clase change string.
 */
class ChangeString
{
  const MIN_CHAR_LOWER = 97;
  const MAX_CHAR_LOWER = 122;

  const MIN_CHAR_UPPER = 65;
  const MAX_CHAR_UPPER = 90;

  public function build($value)
  {
    $charArray = str_split($value);
    foreach ($charArray as $key => $char) {
      $intChar = ord($char);
      if ($intChar > (self::MIN_CHAR_LOWER - 1) && $intChar < (self::MAX_CHAR_LOWER + 1)) {
        $charArray[$key] = chr($this->changeValue($intChar, self::MIN_CHAR_LOWER, self::MAX_CHAR_LOWER));
      }
      elseif ($intChar > (self::MIN_CHAR_UPPER - 1) && $intChar < (self::MAX_CHAR_UPPER + 1)) {
        $charArray[$key] = chr($this->changeValue($intChar, self::MIN_CHAR_UPPER, self::MAX_CHAR_UPPER));
      }
    }
    return trim(implode('',$charArray));
  }
  public function changeValue($intChar, $minRange, $maxRange)
  {
    if ($intChar == $maxRange) {
      return $minRange;
    }
    return $intChar + 1;
  }
}
