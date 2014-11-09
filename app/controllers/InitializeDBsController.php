<?php

class InitializeDBsController extends \BaseController {

    /**
     * Creates database for first login then redirects to admin panel view
     * If user has store_control id then writes db info to session and redirects admin panel
     * @redirects to Store manager Admin panel
     */

    public function index()
	{

        if(! Confide::user()->store_control_id)
        {
            $dbString = "storedb_";
            // Session::put('creating_db', 1);
            DB::insert('insert into store_control (store_name , contact_account_id) values (?,?)', array(Confide::user()->store__name, Confide::user()->id));
            $store_control_id = DB::table('store_control')->where('contact_account_id', Confide::user()->id)->pluck('store_control_id');
            DB::statement('CREATE DATABASE ' . $dbString . $store_control_id);
            DB::table('users')
                ->where('id', Confide::user()->id)
                ->update(array('store_control_id' => $store_control_id));

            Session::put('selia_db', $dbString . $store_control_id);
            Config::set('database.connections.mysql.database', $dbString . $store_control_id);
            DB::reconnect();
            $apppath = app_path();
            DB::unprepared(File::get($apppath.'/SQLs/importDbTables.sql'));
            // Session::pull('creating_db');

            return Redirect::to('/dashboard');

        }

        return Redirect::to('/dashboard');

    }

	/**
	 * Show the form for creating a new resource.
	 * GET /initializedbs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /initializedbs
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /initializedbs/{id}
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
	 * GET /initializedbs/{id}/edit
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
	 * PUT /initializedbs/{id}
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
	 * DELETE /initializedbs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}