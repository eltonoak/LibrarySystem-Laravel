<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Conta extends Authenticatable
{
    use HasFactory;
    protected $table = 'contas';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nome_usuario',
        'password',
        'id_tipo'
    ];
    /**
     * Get the usuario associated with the Conta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function getRouteKeyName()

    // {

    //     return 'slug';
    // }
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'conta_id', 'id');
    }
    /**
     * Get the tipo associated with the Conta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipo()
    {
        return $this->hasOne(Tipo::class, 'id', 'tipo_id');
    }
}
