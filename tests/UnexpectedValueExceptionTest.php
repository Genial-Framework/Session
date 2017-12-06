<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/).
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */

namespace Genial\Session\Tests;

use Genial\Session\Exception\UnexpectedValueException;
use PHPUnit\Framework\TestCase;

/**
 * UnexpectedValueExceptionTest.
 */
final class UnexpectedValueExceptionTest extends TestCase
{
    /**
     * exceptionTest().
     *
     * @throws UnexpectedValueException
     *
     * @return void
     */
    public function exceptionTest()
    {
        $this->expectException(UnexpectedValueException::class);

        throw new UnexpectedValueException();
    }
}
