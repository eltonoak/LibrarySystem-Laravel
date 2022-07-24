<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'enderecos';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'usuario_id',
        'municipio',
        'bairro',
        'rua',
        'casa'
    ];

    /**
     * Get the usuario that owns the Endereco
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
