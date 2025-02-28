<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experiencia
 * 
 * @property int $id
 * @property int $usuario_id
 * @property string $empresa
 * @property string $puesto
 * @property Carbon $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property string|null $descripcion
 * @property Carbon $creado_en
 * @property Carbon $actualizado_en
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Experiencia extends Model
{
	protected $table = 'experiencias';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'creado_en' => 'datetime',
		'actualizado_en' => 'datetime'
	];

	protected $fillable = [
		'usuario_id',
		'empresa',
		'puesto',
		'fecha_inicio',
		'fecha_fin',
		'descripcion',
		'creado_en',
		'actualizado_en'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
