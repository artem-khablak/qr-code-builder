<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $table = 'qr_codes';
    protected $fillable = [
      'qr_code',
      'user_id',
      'width',
      'height'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
