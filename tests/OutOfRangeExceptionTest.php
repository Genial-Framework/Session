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
use PHPUnit\Framework\TestCase;
use Genial\Session\Exception\OutOfRangeException;
/**
 * OutOfRangeExceptionTest
 */
final class OutOfRangeExceptionTest extends TestCase {
    /**
     * exceptionTest()
     *
     * @throws OutOfRangeException
     *
     * @return void
     */
    public function exceptionTest() {
        $this->expectException(OutOfRangeException::class);
        throw new OutOfRangeException();
    }
}
