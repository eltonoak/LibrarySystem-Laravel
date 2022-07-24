<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmprestimoLivro extends Model
{
    use HasFactory;
    protected $table = 'emprestimo_livro';
    public $timestamps = false;
    protected $fillable = [
        'emprestimo_id',
        'livro_id',
    ];
}
