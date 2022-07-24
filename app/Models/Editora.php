<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;
    protected $table = 'editoras';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome',
    ];
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
