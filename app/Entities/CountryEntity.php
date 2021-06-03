<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CountryEntity extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];
	protected $casts   = [];

	/**
	 * Genera la ruta que permite llamar al método de 
	 * edición de controlador y ademas pasa el id de la 
	 * entidad como parámetro
	 *
	 * @return url
	 */
	public function getRouteEdit()
	{
		return base_url('home/edit'.$this->id);
	}

	/**
	 * Genera la ruta que permite llamar al método de 
	 * eliminación de controlador y ademas pasa el id de la 
	 * entidad como parámetro
	 *
	 * @return url
	 */
	public function getRouteDelete()
	{
		return base_url('home/edit'.$this->id);
	}
}
