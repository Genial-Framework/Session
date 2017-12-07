<?php
/**
 * Genial Framework <https://nenglish.me/php/genial-framework>.
 *
 * @link      <https://github.com/Genial-Framework/Genial-Framework> for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Nicholas English <nenglish0820@outlook.com> <https://github.com/Nenglish7>
 * @license   <https://nenglish.me/license/new-bsd> New BSD License
 */

namespace Genial\Session;

use Genial\Session\Exception\BadMethodCallException;
use Genial\Session\Exception\RuntimeException;
use Genial\Session\Exception\UnexpectedValueException;

class Handler extends Manager implements HandlerInterface
{
    public function delete(string $name = null)
    {
        if (!$this->exist()) {
            throw new RuntimeException(sprintf(
                '"%s" detects a non-existent session.',
                __METHOD__
            ));
        }
        if (is_null($name)) {
            throw new BadMethodCallException(sprintf(
                '"%s" expects the "$name" argument.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new UnexpectedValueException(sprintf(
                '"%s" expects "$name" to not be empty.',
                __METHOD__
            ));
        }
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public function get(string $name = null, $defaultReturnValue = null)
    {
        if (!$this->exist()) {
            throw new RuntimeException(sprintf(
                '"%s" detects a non-existent session.',
                __METHOD__
            ));
        }
        if (is_null($name)) {
            throw new BadMethodCallException(sprintf(
                '"%s" expects the "$name" argument.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new UnexpectedValueException(sprintf(
                '"%s" expects "$name" to not be empty.',
                __METHOD__
            ));
        }
        if (isset($_SESSION[$name])) {
            return Utils::decode($_SESSION[$name]);
        }

        return $defaultReturnValue;
    }

    public function set(string $name = null, $value)
    {
        if (!$this->exist()) {
            throw new RuntimeException(sprintf(
                '"%s" detects a non-existent session.',
                __METHOD__
            ));
        }
        if (is_null($name)) {
            throw new BadMethodCallException(sprintf(
                '"%s" expects the "$name" argument.',
                __METHOD__
            ));
        }
        $name = trim($name);
        if (empty($name) || $name == '') {
            throw new UnexpectedValueException(sprintf(
                '"%s" expects "$name" to not be empty.',
                __METHOD__
            ));
        }
        $_SESSION[$name] = Utils::encode($value, false);
    }
}
