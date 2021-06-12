<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'equipments';

    protected $fillable = [
        'pic',
        'name',
        'code',
        'power',
        'group',
        'status',
        'company',
        'site',
        'ownership',
        'ownership_date',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function group()
    {
        return $this->belongsTo(EquipmentGroup::class);
    }

    public function status()
    {
        return $this->belongsTo(EquipmentStatus::class);
    }

    public function ownership()
    {
        return $this->belongsTo(Ownership::class);
    }
}
