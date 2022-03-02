<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dictionary extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'dictionaries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'numero',
        'nombre',
        'ruta',
        'notas',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function diccionarioDictionariesValues()
    {
        return $this->hasMany(DictionariesValue::class, 'diccionario_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
