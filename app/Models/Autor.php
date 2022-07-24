<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $table = 'autores';
    public $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nome',
        'sobrenome',
    ];
    /**
     * Get the user that owns the Autor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**
     * Get all of the comments for the Autor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'autor_id', 'id');
    }
}
