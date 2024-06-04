<?php

namespace App\Traits;

use DateTime;

trait FormValidationTrait
{
    public function checkRequiredData(array $data, string $module = NULL): bool
    {
        if (!isset($data)) {
            return FALSE;
        }

        if ($module === 'user') {
            if (empty($data['first_name']) || empty($data['email'])) {
                return FALSE;
            }
        }

        if ($module === 'order') {
            foreach ($data as $value) {
                if (empty($value)) {
                    return FALSE;
                }
            }
        }

        return TRUE;
    }

    public function priceFormatedToDatabase(string $price): float
    {
        return floatval(str_replace(',', '.', $price));
    }

    public function priceFormatedToBr(string $price): string
    {
        return number_format($price, 2, ',', '.');
    }

    public function dateFormated(string $date): ?string
    {
        if (empty($date)) {
            return NULL;
        }

        $dateFormated = DateTime::createFromFormat('d/m/Y', $date);
        return $dateFormated->format('Y-m-d');

    }

    public function emailFormated(string $email): string
    {
        return strtolower($email);

    }

}