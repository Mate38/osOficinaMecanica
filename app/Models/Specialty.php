<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Specialty
 * 
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $servico_id
 * 
 * @property \App\Models\Service $service
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App\Models
 */
class Specialty extends Eloquent
{
	protected $casts = [
		'servico_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'servico_id'
	];

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class, 'servico_id');
	}

	public function employees()
	{
		return $this->hasMany(\App\Models\Employee::class, 'especialidade_id');
	}
}
