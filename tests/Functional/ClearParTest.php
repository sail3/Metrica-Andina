<?php

namespace Tests\Functional;

use Application\Command\ClearPar;

class ClearParTest extends BaseTestCase {
  public function testChangeLetters()
  {
    $classInstace = new ClearPar();
    $this->assertSame('()()()', $classInstace->build("()())()"));
    $this->assertSame('()()', $classInstace->build("()(()"));
    $this->assertSame('', $classInstace->build(")("));
    $this->assertEquals('()', $classInstace->build("((()"));
  }
}
// entrada : "()())()" salida : "()()()"
// entrada : "()(()" salida : "()()"
// entrada : ")(" salida : ""
// entrada : "((()" salida : "()"
