<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $setor_id
 * 
 * @property \App\Models\Sector $sector
 * @property \Illuminate\Database\Eloquent\Collection $service_order_services
 * @property \Illuminate\Database\Eloquent\Collection $specialties
 *
 * @package App\Models
 */
class Service extends Eloquent
{
	protected $casts = [
		'setor_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'setor_id'
	];

	public function sector()
	{
		return $this->belongsTo(\App\Models\Sector::class, 'setor_id');
	}

	public function service_order_services()
	{
		return $this->hasMany(\App\Models\ServiceOrderService::class, 'servico_id');
	}

	public function specialties()
	{
		return $this->hasMany(\App\Models\Specialty::class, 'servico_id');
	}
}
