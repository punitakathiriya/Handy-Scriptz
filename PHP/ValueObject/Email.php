<?php
/**
 * Created by PhpStorm.
 * User: adrmrn
 * Date: 04.10.2018
 * Time: 10:49
 *
 * This script is compatibility with PHP 7.3
 */

class Email
{
    /**
     * @var string
     */
    private $address;

    public function __construct(string $address)
    {
        if (!self::isValid($address)) {
            throw new \InvalidArgumentException('Email is invalid.', 422);
        }

        $this->address = $address;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->address;
    }

    public function localPart(): string
    {
        $emailParts = explode('@', $this->address, 2);

        return $emailParts[0];
    }

    public function domain(): string
    {
        $emailParts = explode('@', $this->address, 2);

        return $emailParts[1];
    }

    public static function isValid(string $address): bool
    {
        return filter_var($address, FILTER_VALIDATE_EMAIL);
    }
}