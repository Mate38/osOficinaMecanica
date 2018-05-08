<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Piece
 * 
 * @property int $id
 * @property string $nome
 * @property string $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $service_order_services
 *
 * @package App\Models
 */
class Piece extends Eloquent
{
	protected $fillable = [
		'nome',
		'valor'
	];

	public function service_order_services()
	{
		return $this->belongsToMany(\App\Models\ServiceOrderService::class, 'piece_service_order_services', 'peca_id', 'servico_ordem_id')
					->withPivot('id')
					->withTimestamps();
	}
}
