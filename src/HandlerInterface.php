<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Session> For the canonical source repository.
 *
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Session/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Session;

/**
 * HandlerInterface.
 */
interface HandlerInterface
{
    public function delete(string $name = null);

    public function get(string $name = null, $defaultReturnValue = null);

    public function set(string $name = null, $value);
}
