<?php

namespace App\Controllers;

use App\Entities\CountryEntity;
use Hermawan\DataTables\DataTable;

class Home extends BaseController
{
	protected $countryModel;
	protected $countryEntity;

	public function __construct()
	{
		$this->countryModel = model('CountryModel');
		$this->countryEntity = new CountryEntity();
	}
	public function index()
	{
		$countries = $this->countryModel->findAll();
		return view('country/countries',['countries' => $countries]);
	}

	public function getCountries()
	{
		//Estado generado de la consulta
		$builder = $this->countryModel->getCountries();
        return DataTable::of($builder)
		//Filtro personalizad
		->filter(function ($builder, $request) {
			//Comprobamos si tiene el algo el request
            if ($request->country){
				$builder->where('name', $request->country);
			}

        })
		//Agrega un columna con en este caso agrega los botones de editar y eliminar
		->add('action', function($row){
            return "
			<a class='button is-success is-small' href='".base_url('home/edit/'.$row->id)."'>Editar</a> 
			<a class='button is-danger is-small' href='".base_url('home/delete/'.$row->id)."'>Eliminar</a>
			";
        })
		//Agrega la columna para enumerar los registros
		->addNumbering('no')
		//Columnas habilitadas para la búsqueda
		->setSearchableColumns(['id','name','created_at','updated_at'])
		//devuelve el JSON
		->toJson(true);
	}
}
