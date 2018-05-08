<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $cpf
 * @property string $nome
 * @property string $email
 * @property string $telefone1
 * @property string $telefone2
 * @property string $carteira_trabalho
 * @property string $numero
 * @property string $cep
 * @property string $complemento
 * @property string $estado
 * @property string $cidade
 * @property string $bairro
 * @property string $logradouro
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $especialidade_id
 * 
 * @property \App\Models\Specialty $specialty
 * @property \Illuminate\Database\Eloquent\Collection $service_order_services
 *
 * @package App\Models
 */
class Employee extends Eloquent
{
	protected $casts = [
		'especialidade_id' => 'int'
	];

	protected $fillable = [
		'cpf',
		'nome',
		'email',
		'telefone1',
		'telefone2',
		'carteira_trabalho',
		'numero',
		'cep',
		'complemento',
		'estado',
		'cidade',
		'bairro',
		'logradouro',
		'especialidade_id'
	];

	public function specialty()
	{
		return $this->belongsTo(\App\Models\Specialty::class, 'especialidade_id');
	}

	public function service_order_services()
	{
		return $this->hasMany(\App\Models\ServiceOrderService::class, 'funcionario_id');
	}
}
