<?php

class DepartmentsController extends \BaseController {

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
	 * GET /departments
	 *
	 * @return Response
	 */
	public function index()
	{

        $departments = DB::select('SELECT * from departments');
        return View::make('departments.index', compact('departments'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /departments/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('departments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /departments
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_token');
        // pluck tax id this one is the last input in form will be inserted in store_tax table
        DB::table('departments')->insert($input);
        return Redirect::to('departments');
	}

	/**
	 * Display the specified resource.
	 * GET /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function departmentList()
	{
        $departments = DB::select('SELECT * from departments');
        return $departments;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /departments/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $department = department::where('department_id', '=', $id)->firstOrFail();
        return View::make('departments.edit', compact('department'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /departments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::except('_token','_method');
        DB::table('departments')->where('department_id', $id)->update($input);
        return Redirect::to('departments');
	}



}