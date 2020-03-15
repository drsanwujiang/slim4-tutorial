<?php

namespace App\Domain\User\Data;

use Selective\ArrayReader\ArrayReader;

final class UserCreateData
{
    /** @var string|null */
    public ?string $username;

    /** @var string|null */
    public ?string $firstName;

    /** @var string|null */
    public ?string $lastName;

    /** @var string|null */
    public ?string $email;

    /**
     * The constructor.
     *
     * @param array $array The array with data
     */
    public function __construct(array $array = [])
    {
        $data = new ArrayReader($array);

        $this->username = $data->findString("username");
        $this->firstName = $data->findString("first_name");
        $this->lastName = $data->findString("last_name");
        $this->email = $data->findString("email");
    }
}
