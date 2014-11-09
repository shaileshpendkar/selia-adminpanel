<?php

class StoreLocationsController extends \BaseController {
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
	 * GET /storelocations
	 *
	 * @return Response
	 */
	public function index()
	{
        $store_locations = DB::select('SELECT s.*,t.* FROM stores s left outer join store_taxes st on s.store_id = st.store_id left join taxes t on st.tax_id = t.tax_id ');
        return View::make('store_locations.index', compact('store_locations'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /storelocations/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $tax_options = DB::table('taxes')->lists('tax_description','tax_id');
       return View::make('store_locations.create',array('tax_options' => $tax_options));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /storelocations
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_token');
        // pluck tax id this one is the last input in form will be inserted in store_tax table
        $tax_id = array_pop($input);
        $id = DB::table('stores')->insertGetId($input);
        DB::table('store_taxes')->insert(
            array('store_id' => $id, 'tax_id' => $tax_id[0])
        );
        return Redirect::to('store_locations');
	}

	/**
	 * Display the specified resource.
	 * GET /storelocations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /storelocations/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $store = store::where('store_id', '=', $id)->firstOrFail();
        return View::make('store_locations.edit', compact('store'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /storelocations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::except('_token','_method');
        // pluck tax id this one is the last input in form will be inserted in store_tax table
        $tax_id = array_pop($input);
        DB::table('stores')->where('store_id', $id)->update($input);
        DB::table('store_taxes')->where('store_id', $id)->update(array('tax_id' => $tax_id));
        return Redirect::to('store_locations');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /storelocations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}