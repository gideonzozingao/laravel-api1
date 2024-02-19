<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class ReportType extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'report_type',
        'description',
    ];
}
