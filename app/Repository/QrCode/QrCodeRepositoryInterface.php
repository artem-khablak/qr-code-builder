<?php

namespace App\Repository\QrCode;

interface QrCodeRepositoryInterface
{
    public function store($attributes);
    public function getUsersQrCodes();
}
