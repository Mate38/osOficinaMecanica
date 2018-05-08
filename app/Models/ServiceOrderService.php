<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ServiceOrderService
 * 
 * @property int $id
 * @property string $observacao
 * @property int $status
 * @property string $horas_atividade
 * @property string $valor_total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $servico_id
 * @property int $ordemservico_id
 * @property int $funcionario_id
 * 
 * @property \App\Models\Employee $employee
 * @property \App\Models\OrderService $order_service
 * @property \App\Models\Service $service
 * @property \Illuminate\Database\Eloquent\Collection $pieces
 *
 * @package App\Models
 */
class ServiceOrderService extends Eloquent
{
	protected $casts = [
		'status' => 'int',
		'servico_id' => 'int',
		'ordemservico_id' => 'int',
		'funcionario_id' => 'int'
	];

	protected $fillable = [
		'observacao',
		'status',
		'horas_atividade',
		'valor_total',
		'servico_id',
		'ordemservico_id',
		'funcionario_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'funcionario_id');
	}

	public function order_service()
	{
		return $this->belongsTo(\App\Models\OrderService::class, 'ordemservico_id');
	}

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class, 'servico_id');
	}

	public function pieces()
	{
		return $this->belongsToMany(\App\Models\Piece::class, 'piece_service_order_services', 'servico_ordem_id', 'peca_id')
					->withPivot('id')
					->withTimestamps();
	}
}
