<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipos';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'tipo',
    ];
    /**
     * Get the conta that owns the Tipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }
}
