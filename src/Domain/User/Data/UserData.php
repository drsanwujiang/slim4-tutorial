<?php

namespace App\Domain\User\Data;

use Selective\ArrayReader\ArrayReader;

final class UserData
{
    /** @var int */
    public int $id;

    /** @var string */
    public string $username;

    /** @var string */
    public string $firstName;

    /** @var string */
    public string $lastName;

    /** @var string */
    public string $email;

    /**
     * The constructor.
     *
     * @param array $array The array with data
     */
    public function __construct(array $array = [])
    {
        $data = new ArrayReader($array);

        $this->id = $data->getInt("id");
        $this->username = $data->getString("username");
        $this->firstName = $data->getString("first_name");
        $this->lastName = $data->getString("last_name");
        $this->email = $data->getString("email");
    }
}
