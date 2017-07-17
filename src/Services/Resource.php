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
   * Retrieve a employee filtering by ID.
   */
  public static function findById($id)
  {
    $source = self::retrieveAll();
    foreach ($source as $value ) {
      if ($value->id === $id) {
        return $value;
      }
    }
    return false;
  }
}
