<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PieceServiceOrderService
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $peca_id
 * @property int $servico_ordem_id
 * 
 * @property \App\Models\Piece $piece
 * @property \App\Models\ServiceOrderService $service_order_service
 *
 * @package App\Models
 */
class PieceServiceOrderService extends Eloquent
{
	protected $casts = [
		'peca_id' => 'int',
		'servico_ordem_id' => 'int'
	];

	protected $fillable = [
		'peca_id',
		'servico_ordem_id'
	];

	public function piece()
	{
		return $this->belongsTo(\App\Models\Piece::class, 'peca_id');
	}

	public function service_order_service()
	{
		return $this->belongsTo(\App\Models\ServiceOrderService::class, 'servico_ordem_id');
	}
}
