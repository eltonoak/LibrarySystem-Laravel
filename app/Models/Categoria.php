<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'categoria',
    ];
    public function livros()
    {
        return $this->hasMany(Livro::class, 'categoria_id', 'id');
    }
}
