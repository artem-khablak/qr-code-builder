<?php

namespace App\Http\Controllers\QrCodes;

use App\Http\Controllers\Controller;
use App\Http\Resources\QrCodeResource;
use App\Repository\QrCode\QrCodeRepository;
use App\Services\QrCodesService;
use Illuminate\Http\Request;

class QrCodesController extends Controller
{
    /**
     * @var QrCodeRepository
     * @var QrCodesService
     */
    protected $qrCodeRepository;
    protected $qrCodeService;

    public function __construct(
        QrCodeRepository $qrCodeRepository,
        QrCodesService $qrCodeService
    ) {
        $this->qrCodeRepository = $qrCodeRepository;
        $this->qrCodeService = $qrCodeService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $userId = auth()->id();
        $data['user_id'] = $userId;
        $data['file_format'] = 'png';

        $attributes['user_id'] = $userId;
        $attributes['qr_code'] = $this->qrCodeService->generateQrCode($data);
        $attributes['width'] = $data['size'];
        $attributes['height'] = $data['size'];

        $qrCode = $this->qrCodeRepository->store($attributes);
        return new QrCodeResource($qrCode);
    }
}
