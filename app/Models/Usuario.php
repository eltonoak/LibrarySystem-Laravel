<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nome',
        'sobrenome',
        'bi',
        'genero',
        'data_nascimento',
        'conta_id'
    ];
    /**
     * Get the Endereco associated with the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
    /**
     * Get the Contactos associated with the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contacto()
    {
        return $this->hasOne(Contacto::class);
    }

    /**
     * Get the Conta associated with the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function conta()
    {
        return $this->hasOne(Conta::class, 'id', 'conta_id');
    }
    /**
     * Get all of the emprestimo for the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
