<?php

namespace App\Repository\QrCode;

use App\Models\QrCode;
use Illuminate\Support\Facades\Auth;

class QrCodeRepository implements QrCodeRepositoryInterface
{
    protected $model;

    public function __construct(QrCode $model)
    {
        $this->model = $model;
    }

    public function store($attributes)
    {
        $model = clone $this->model;
        $model->fill($attributes);
        $model->save();

        return $model;
    }

    public function getUsersQrCodes()
    {
        return Auth::user()->qr_codes;
    }
}
