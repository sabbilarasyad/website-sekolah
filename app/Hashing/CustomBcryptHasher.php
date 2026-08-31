<?php

namespace App\Hashing;

use Illuminate\Hashing\BcryptHasher;

class CustomBcryptHasher extends BcryptHasher
{
    /**
     * Check if the given hashed value uses the correct algorithm.
     *
     * @param  string  $hashedValue
     * @return bool
     */
    protected function isUsingCorrectAlgorithm($hashedValue)
    {
        return $this->isValidBcrypt($hashedValue);
    }

    /**
     * Check if the given value is a valid bcrypt hash (supports $2a$, $2b$, $2y$).
     *
     * @param  string  $hashedValue
     * @return bool
     */
    protected function isValidBcrypt($hashedValue)
    {
        return (bool) preg_match('#^\$2[aby]\$\d{2}\$[./A-Za-z0-9]{53}$#', $hashedValue);
    }
}