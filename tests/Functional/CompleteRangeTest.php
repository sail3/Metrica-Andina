<?php

namespace Tests\Functional;

use Application\Command\CompleteRange;

class CompleteRangeTest extends BaseTestCase {
  public function testCompleteRange()
  {
    $classInstace = new CompleteRange();
    $this->assertSame([1, 2, 3, 4, 5], $classInstace->build([1, 2, 4, 5]));
    $this->assertSame([2, 3, 4, 5, 6, 7, 8, 9], $classInstace->build([2, 4, 9]));
    $this->assertSame([55, 56, 57, 58, 59, 60], $classInstace->build([55, 58, 60]));
  }
}
// entrada : [1, 2, 4, 5] salida : [1, 2, 3​, 4, 5]
// entrada : [2, 4, 9] salida : [2, 3​,​ 4, 5, 6, 7, 8​, 9]
// entrada : [55, 58, 60] salida : [55, 56, 57, ​58, 59,​ 60]
