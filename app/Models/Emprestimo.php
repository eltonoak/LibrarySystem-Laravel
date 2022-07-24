<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    protected $table = 'emprestimos';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'usuario_id',
        'data_inicio',
        'data_fim',
        'estado'
    ];

    /**
     * Get the usuario that owns the Emprestimo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    /**
     * Get the livro associated with the Emprestimo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'emprestimo_livro', 'emprestimo_id', 'livro_id');
    }
}
