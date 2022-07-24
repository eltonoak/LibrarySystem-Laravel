<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $table = 'livros';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'capa',
        'isbn',
        'categoria_id',
        'paginas',
        'edicao',
        'editora_id'
    ];

    /**
     * Get the user that owns the Livro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autores()
    {
        return $this->belongsToMany(Autor::class);
    }
    public function editora()
    {
        return $this->belongsTo(Editora::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * The emprestimos that belong to the Livro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function emprestimos()
    {
        return $this->belongsToMany(Emprestimo::class, 'emprestimo_livro', 'emprestimo_id', 'livro_id');
    }
}
