<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Cookie> For the canonical source repository.
 *
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cookie/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Session;

use Genial\Session\Exception\RuntimeException;

/**
 * HandlerTest.
 */
final class HandlerTest extends \PHPUnit\Framework\TestCase
{
    private $handler;

    public function __construct()
    {
        $handler = new Handler();
    }

    public function testHandler()
    {
        $this->expectException(RuntimeException::class);
        $this->handler->delete('test');
    }
}
