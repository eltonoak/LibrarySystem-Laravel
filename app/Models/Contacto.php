<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table = 'contactos';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'usuario_id',
        'telefone_principal',
        'telefone_alternativo',
    ];
}
