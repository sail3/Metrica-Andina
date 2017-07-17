<?php

namespace Tests\Functional;

use Application\Command\ChangeString;

class ChangeStringTest extends BaseTestCase {
  public function testChangeLetters()
  {
    $classInstace = new ChangeString();
    $this->assertSame('123 bcde3', $classInstace->build("123 abcd3"));
    $this->assertSame('**Dbtb 52', $classInstace->build("**Casa 52"));
    $this->assertSame('**Dbtb 52A', $classInstace->build("**Casa 52Z"));
    $this->assertEquals('a', "a");
  }
}
// entrada : "123 abcd3" salida : "123 bcde​ 3"
// entrada : "**Casa 52" salida : "**Dbtb​ 52"
// entrada : "**Casa 52Z" salida : "**Dbtb​ 52A​"
