<?php
namespace Application\Services;
/**
 * Clase Resource.
 */
class Resource
{
  // Source path
  const SOURCE_PATH = __DIR__.'/../../assets/employees.json';

  /**
   * Retrieve a list of employees, in source path.
   */
  public static function retrieveAll()
  {
    $content = json_decode(file_get_contents(self::SOURCE_PATH));
    return $content;
  }

  /**
   * Retrieve a list of employees filtered by email.
   */
  public static function findByEmail($email)
  {
    $source = self::retrieveAll();
    if (strlen($email) == 0) {
      return $source;
    }

    $returnValues = [];
    foreach ($source as $key => $value) {
      if (strpos($value->email, $email) !== false) {
        $returnValues[] = $value;
      }
    }
    return $returnValues;
  }

  /**
   * Retrieve a list of employee when salary between $minRange and $maxRange.
   */
  public function retrieveBySalyRange($minRange, $maxRange)
  {
    $source = self::retrieveAll();
    $returnValues = [];
    foreach ($source as $key => $value) {
      $salary = preg_replace("/([^0-9\\.])/i", "", $value->salary);
      if ($salary > $minRange && $salary < $maxRange) {
        $returnValues[] = $value;
      }
    }
    return $returnValues;
  }
}
