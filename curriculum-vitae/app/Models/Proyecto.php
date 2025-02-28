<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 * 
 * @property int $id
 * @property int $usuario_id
 * @property string $titulo
 * @property string $descripcion
 * @property string|null $enlace_proyecto
 * @property Carbon $creado_en
 * @property Carbon $actualizado_en
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Proyecto extends Model
{
	protected $table = 'proyectos';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'creado_en' => 'datetime',
		'actualizado_en' => 'datetime'
	];

	protected $fillable = [
		'usuario_id',
		'titulo',
		'descripcion',
		'enlace_proyecto',
		'creado_en',
		'actualizado_en'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
