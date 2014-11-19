<?php

class DashboardsController extends \BaseController {
    public function __construct()
    {
        $this->beforeFilter('auth');

        $this->beforeFilter('connStoreDB');

        $this->afterFilter('disconnStoreDB');
    }
	/**
	 * Display a listing of the resource.
	 * GET /dashboards
	 *
	 * @return Response
	 */
	public function index()
	{
		// dd('sfsf');
		Config::set('database.connections.mysql.database', 'storedb_'.Confide::user()->store_control_id);
    	DB::reconnect();
        $license = DB::select('SELECT numof_devices_licensed,DATE_FORMAT(license_end_date,"%W %M %Y") as license_end_date from selia_control.store_control where store_control_id ='.Confide::user()->store_control_id);
        $sales_today = DB::select('SELECT IFNULL(sum(sub_total),"0.00/-") as sales FROM trns T, invoice I
                                    WHERE DATE(I.ts) = CURDATE() AND
                                    T.store_id = I.store_id AND
                                    T.inv_num = I.inv_num AND
                                    T.inv_type = I.inv_type');
        // dd(DB::getQueryLog());
        return View::make('reports.dashboard')->with('license',$license)->with('sales_today',$sales_today);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dashboards/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dashboards
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dashboards/{id}
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
	 * GET /dashboards/{id}/edit
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
	 * PUT /dashboards/{id}
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
	 * DELETE /dashboards/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}