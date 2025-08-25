<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'equipo_id', 'descripcion', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
