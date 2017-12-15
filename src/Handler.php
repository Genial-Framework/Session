<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Session> for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Session/blob/master/LICENSE> New BSD License
 */

namespace Genial\Session;

use Genial\Session\Exception\RuntimeException;
use Genial\Session\Exception\BadMethodCallException;
use Genial\Session\Exception\UnexpectedValueException;

/**
 * Handler.
 */
class Handler extends Manager implements HandlerInterface
{
    /**
     * delete().
     *
     * Deletes a session variable.
     *
     * @param string|null $name The name of the session variable.
     *
     * @throws BadMethodCallException   If the `name` parameter is missing.
     * @throws RuntimeException         If a session does not exist.
     * @throws UnexpectedValueException If the `name` parameter is empty.
     *
     * @return void
     */
    public function delete(string $name = null)
    {
        if (! $this->exist()) {
            throw new RuntimeException(sprintf(
                '`%s` detects a non-existent session.',
                __METHOD__
            ));
        }
        if (is_null($name)) {
            throw new BadMethodCallException(sprintf(
                '`%s` expects the `$name` argument.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new UnexpectedValueException(sprintf(
                '`%s` expects `$name` to not be empty.',
                __METHOD__
            ));
        }
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * get().
     *
     * Gets a session variable.
     *
     * @param string|null $name               The name of the session variable.
     * @param mixed|null  $defaultReturnValue The default return value if the
     *                                        function fails.
     *
     * @throws BadMethodCallException   If the `name` parameter is missing.
     * @throws RuntimeException         If a session does not exist.
     * @throws UnexpectedValueException If the `name` parameter is empty.
     *
     * @return mixed Returns the value of the session variable or the default
     *               return value.
     */
    public function get(string $name = null, $defaultReturnValue = null)
    {
        if (! $this->exist()) {
            throw new RuntimeException(sprintf(
                '`%s` detects a non-existent session.',
                __METHOD__
            ));
        }
        if (is_null($name)) {
            throw new BadMethodCallException(sprintf(
                '`%s` expects the `$name` argument.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new UnexpectedValueException(sprintf(
                '`%s` expects `$name` to not be empty.',
                __METHOD__
            ));
        }
        if (isset($_SESSION[$name])) {
            return Utils::decode($_SESSION[$name]);
        }

        return $defaultReturnValue;
    }

    /**
     * set().
     *
     * Sets a session variable.
     *
     * @param string|null $name  The name of the session variable.
     * @param mixed       $value The value of the session variable.
     *
     * @throws BadMethodCallException   If the `name` parameter is missing.
     * @throws RuntimeException         If a session does not exist.
     * @throws UnexpectedValueException If the `name` parameter is empty.
     *
     * @return mixed Returns the value of the session variable or the default
     *               return value.
     */
    public function set(string $name = null, $value)
    {
        if (! $this->exist()) {
            throw new RuntimeException(sprintf(
                '`%s` detects a non-existent session.',
                __METHOD__
            ));
        }
        if (is_null($name)) {
            throw new BadMethodCallException(sprintf(
                '`%s` expects the `$name` argument.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new UnexpectedValueException(sprintf(
                '`%s` expects `$name` to not be empty.',
                __METHOD__
            ));
        }
        $_SESSION[$name] = Utils::encode($value, false);
    }
}
