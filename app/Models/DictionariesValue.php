<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictionariesValue extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'dictionaries_values';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'diccionario_id',
        'nombre',
        'texto_inicial',
        'text_final',
        'valor_inicial',
        'valor_final',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function diccionario()
    {
        return $this->belongsTo(Dictionary::class, 'diccionario_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
