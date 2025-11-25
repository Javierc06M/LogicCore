<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'type',
        'document_type',
        'document_number',
        'name',
        'lastname',
        'business_name',
        'email',
        'phone',
        'address',
        'district',
        'province',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
        'type' => 'string',
        'document_type' => 'string',
    ];

    // ===========================
    // SCOPES ÚTILES
    // ===========================

    public function scopeByDocument($query, $number)
    {
        return $query->where('document_number', $number);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->name} {$this->lastname}");
    }
}
