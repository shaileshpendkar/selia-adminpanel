<?php

class Tax extends \Eloquent {
	protected $fillable = ['tax_description', 'tax_prc'];

	protected $table = 'taxes';
	protected $primaryKey = 'tax_id';
	public $timestamps = false;


	private $tax_description;
	private $tax_prc;
}