<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 08 May 2018 20:09:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Client
 * 
 * @property int $id
 * @property string $cpfcnpj
 * @property string $nome
 * @property string $email
 * @property string $telefone1
 * @property string $telefone2
 * @property string $numero
 * @property string $cep
 * @property string $complemento
 * @property string $estado
 * @property string $cidade
 * @property string $bairro
 * @property string $logradouro
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $order_services
 *
 * @package App\Models
 */
class Client extends Eloquent
{
	protected $fillable = [
		'cpfcnpj',
		'nome',
		'email',
		'telefone1',
		'telefone2',
		'numero',
		'cep',
		'complemento',
		'estado',
		'cidade',
		'bairro',
		'logradouro'
	];

	public function order_services()
	{
		return $this->hasMany(\App\Models\OrderService::class, 'cliente_id');
	}
}
