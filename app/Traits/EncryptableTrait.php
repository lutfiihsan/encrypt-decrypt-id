<?php

namespace App\Traits;

trait EncryptableTrait
{
    protected $encryption_key = 'xyaBcDeFgHiJkLmNoPqRsTuVwXyZ1234567890';
    protected $initialization_vector = '1234567890xyaBcD';

    public function getRouteKey()
    {
        return urlencode($this->encryptId($this->getKey()));
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? $this->getRouteKeyName(), $this->decryptId($value))->firstOrFail();
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function encryptId($id)
    {
        return rtrim(openssl_encrypt($id, 'AES-256-CBC', $this->encryption_key, 0, $this->initialization_vector), '=');
    }

    public function decryptId($encryptedId)
    {
        return openssl_decrypt($encryptedId, 'AES-256-CBC', $this->encryption_key, 0, $this->initialization_vector);
    }

    public function toArray()
    {
        $attributes = $this->attributesToArray();
        $attributes[$this->getRouteKeyName()] = $this->getRouteKey();

        return $attributes;
    }
}

