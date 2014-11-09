<?php

class AttributesController extends \BaseController {
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
	 * GET /attributes
	 *
	 * @return Response
	 */
	public function index()
	{
       // $dimension_id = Input::get('dimension_id');
       $attributes = DB::table('attributes')->where('dimension_id',$dimension_id)->lists('attribute', 'attribute_id');
       // return $attributes;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /attributes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		retrun('ceating attr');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /attributes
	 *
	 * @return Response
	 */
	public function store()
	{
        //check if its our form
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt'
            ) );
        }
        $dimension_id = Input::get( 'dimension_id' );
        $attribute = Input::get( 'attribute' );

        //validate data
        //and then store it in DB
        $id = DB::table('attributes')->insertGetId(
            array('dimension_id' => $dimension_id, 'attribute' => $attribute)
        );

        $response = array(
            'attribute_id' => $id,
            'attribute' => $attribute
        );

        return Response::json( $response );

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
		return('shailesh');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /attributes/{id}/edit
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
	 * PUT /attributes/{id}
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
	 * DELETE /attributes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}