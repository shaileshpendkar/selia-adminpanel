<?php

class DimensionsController extends \BaseController {
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
	 * GET /dimensions
	 *
	 * @return Response
	 */
	public function index()
	{
        $dimensions = DB::select('SELECT * from dimensions');
        return View::make('dimensions.index', compact('dimensions'));
	}

    /**
     * Display the specified resource.
     * GET /attributes/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $dimension = DB::table('dimensions')->where('dimension_id', $id)->first();
        $attributes = DB::select('select * from attributes where dimension_id='.$id);

        return View::make('dimensions.attributes')->with('attributes',$attributes)->with('dimension',$dimension);
    }



	/**
	 * Show the form for creating a new resource.
	 * GET /dimensions/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $dimension_optons = DB::table('dimensions')->orderBy('dimension', 'asc')->lists('dimension','dimension_id');
        return View::make('dimensions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dimensions
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $rules = array('dimension' => array('required', 'min:2'));
        $validation = Validator::make($input, $rules);

       if ($validation->passes())
        {
            Dimension::create($input);

            return Redirect::route('dimensions.index')->with('message', 'Item Variant created');

       }

        return Redirect::route('dimensions.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 * GET /dimensions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function dimensionsList()
	{
        $dimension_optons = DB::select('SELECT * from dimensions');
        return $dimension_optons;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dimensions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /dimensions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /dimensions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}