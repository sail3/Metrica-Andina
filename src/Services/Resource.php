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

}
