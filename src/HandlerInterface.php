<?php
/**
 * Genial Framework <https://nenglish.me/php/genial-framework>.
 *
 * @link      <https://github.com/Genial-Framework/Genial-Framework> for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Framework <https://github.com/Genial-Framework>
 * @license   <https://nenglish.me/license/new-bsd> New BSD License
 */

namespace Genial\Session;

interface HandlerInterface
{
    public function delete(string $name);

    public function get(string $name, $defaultReturnValue = null);

    public function set(string $name, $value);
}
