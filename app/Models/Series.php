<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;
    //protected $table = 'seriados';

    protected $fillable = ['name'];
   //protected $with = ['temporadas'];

    public function seasons()
    {
        // Retorna todas as temporadas de uma série
        // Relacionamento 1:N
        // uma série tem várias temporadas
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted()
    {
        // Executa a função quando o modelo é carregado
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name', 'asc');
        });
    }
}
