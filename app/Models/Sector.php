<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sector
 * 
 * @property int $id
 * @property string $nome
 * @property string $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $services
 *
 * @package App\Models
 */
class Sector extends Eloquent
{
	protected $fillable = [
		'nome',
		'valor'
	];

	public function services()
	{
		return $this->hasMany(\App\Models\Service::class, 'setor_id');
	}
}
