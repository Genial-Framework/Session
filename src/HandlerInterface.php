<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/).
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */

namespace Genial\Session;

/**
 * HandlerInterface.
 */
interface HandlerInterface
{
    public function delete(string $name);

    public function get(string $name, $defaultReturnValue = null);

    public function set(string $name, $value);
}
