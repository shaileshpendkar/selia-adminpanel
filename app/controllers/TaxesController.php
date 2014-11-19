<?php

class TaxesController extends \BaseController {
    /**
     * Route Filter
     * Show only when logged in
     * Change to store db
     */
    public function __construct()
    {
        $this->beforeFilter('auth');

        $this->beforeFilter('connStoreDB');

        $this->afterFilter('disconnStoreDB');
    }


	/**
	 * Display a listing of the resource.
	 * GET /taxes
	 *
	 * @return Response
	 */
	public function index()
	{
        $taxes = DB::select('SELECT * from taxes');
        return View::make('taxes.index', compact('taxes'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /taxes/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('taxes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /taxes
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_token');
        // pluck tax id this one is the last input in form will be inserted in store_tax table
        // DB::table('taxes')->insert($input);
        Tax::create([
        	'tax_description' => $input['tax_description'],
        	'tax_prc' => $input['tax_prc']
        	]);
        return Redirect::to('taxes');
	}

	/**
	 * Display the specified resource.
	 * GET /taxes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$taxes = DB::table('taxes')->lists('tax_description', 'tax_id');
        return $taxes;
	}

    /**
     * @param $store_id
     * get store tax ids
     */
    public function storetax($store_id)
    {
        $taxes = DB::table('store_taxes')->where('store_id', '=', $store_id)->get();
        return $taxes;
    }
	/**
	 * Show the form for editing the specified resource.
	 * GET /taxes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $tax = tax::where('tax_id', '=', $id)->firstOrFail();
        return View::make('taxes.edit', compact('tax'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /taxes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::except('_token','_method');
        DB::table('taxes')->where('tax_id', $id)->update($input);
        return Redirect::to('taxes');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /taxes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}