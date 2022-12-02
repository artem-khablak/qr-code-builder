<?php

namespace App\Services;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class QrCodesService
{
    /**
     * Generates qr-code by input string
     * @param array $data
     * @return string
     */
    public function generateQrCode(array $data)
    {
        list($colorR, $colorG, $colorB) = sscanf($data['fill_color'], '#%02x%02x%02x');
        list($bgColorR, $bgColorG, $bgColorB) = sscanf($data['background_color'], "#%02x%02x%02x");

        $qrCode = QrCode::format($data['file_format'])
            ->size($data['size'])
            ->color($colorR, $colorG, $colorB)
            ->backgroundColor($bgColorR, $bgColorG, $bgColorB)
            ->generate($data['content']);

        $outputFile = 'img/qr-code/img-' . time() . '.png';
        Storage::disk('public')->put($outputFile, $qrCode);
        return $outputFile;
    }
}
