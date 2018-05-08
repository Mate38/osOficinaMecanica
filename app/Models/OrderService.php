<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OrderService
 * 
 * @property int $id
 * @property int $numero_ordem
 * @property string $data_abertura
 * @property string $data_encerramento
 * @property int $status
 * @property string $observacao
 * @property string $valor_total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $user_id
 * @property int $cliente_id
 * 
 * @property \App\Models\Client $client
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $services
 *
 * @package App\Models
 */
class OrderService extends Eloquent
{
	protected $casts = [
		'numero_ordem' => 'int',
		'status' => 'int',
		'user_id' => 'int',
		'cliente_id' => 'int'
	];

	protected $fillable = [
		'numero_ordem',
		'data_abertura',
		'data_encerramento',
		'status',
		'observacao',
		'valor_total',
		'user_id',
		'cliente_id'
	];

	public function client()
	{
		return $this->belongsTo(\App\Models\Client::class, 'cliente_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function services()
	{
		return $this->belongsToMany(\App\Models\Service::class, 'service_order_services', 'ordemservico_id', 'servico_id')
					->withPivot('id', 'observacao', 'status', 'horas_atividade', 'valor_total', 'funcionario_id')
					->withTimestamps();
	}
}
