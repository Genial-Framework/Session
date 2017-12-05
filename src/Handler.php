<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/)
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */
namespace Genial\Session;
use Genial\Session\Exception\BadMethodCallException;
use Genial\Session\Exception\RuntimeException;
use Genial\Session\Exception\UnexpectedValueException;
/**
 * Handler
 */
class Handler extends Manager implements HandlerInterface {
    /**
     * set()
     *
     * Set a session variable
     *
     * @param string|null $name The name of the session variable
     * @param mixed $value The value of the session variable
     *
     * @throws BadMethodCallException If the $name argument is missing
     * @throws RuntimeException If a session is not running
     * @throws UnexpectedValueException If the $name argument is empty
     *
     * @return void
     */
    public function set(string $name = null, $value) {
        if (!$this->exist()) {
            throw new RuntimeException(sprintf(
                '"%s" expects a running session.',
                __METHOD__
            ));
        }
        if (!$name) {
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
    /**
     * get()
	 *
	 * Get a session variable
	 *
	 * @param string|null $name The name of the session variable
	 * @param mixed $defaultReturnValue The default value if the session variable is non-existent
	 *
	 * @throws BadMethodCallException If the $name argument is missing
	 * @throws RuntimeException If a session is not running
	 * @throws UnexpectedValueException If the $name argument is empty
	 *
	 * @return mixed|$defaultReturnValue Return the session variable value or the default return value
	 */
	public function get(string $name = null, $defaultReturnValue = null) {
		if (!$this->exist()) {
			throw new RuntimeException(sprintf(
				'"%s" expects a running session.',
				__METHOD__
			));
		}
		if (!$name) {
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
	/**
	 * delete()
	 *
	 * Delete a session variable
	 *
	 * @param string|null $name The name of the session variable
     *
	 * @throws BadMethodCallException If the $name argument is missing
	 * @throws RuntimeException If a session is not running
	 * @throws UnexpectedValueException If the $name argument is empty
	 *
	 * @return void
	 */
	public function delete(string $name = null) {
		if (!$this->exist()) {
			throw new RuntimeException(sprintf(
				'"%s" expects a running session.',
				__METHOD__
			));
		}
		if (!$name) {
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
}
