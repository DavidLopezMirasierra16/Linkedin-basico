<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Habilidade
 * 
 * @property int $id
 * @property int $usuario_id
 * @property string $nombre_habilidad
 * @property string $nivel
 * @property Carbon $creado_en
 * @property Carbon $actualizado_en
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Habilidade extends Model
{
	protected $table = 'habilidades';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'creado_en' => 'datetime',
		'actualizado_en' => 'datetime'
	];

	protected $fillable = [
		'usuario_id',
		'nombre_habilidad',
		'nivel',
		'creado_en',
		'actualizado_en'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
