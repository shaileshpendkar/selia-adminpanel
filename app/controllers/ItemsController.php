<?php
class ItemsController extends \BaseController
{

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
     * GET /items
     *
     * @return Response
     */
    public function index()
    {
        $items= DB::table('items')
            ->join('catalog', 'items.item_id', '=', 'catalog.item_id','left outer')
            ->join('departments', 'items.department_id', '=', 'departments.department_id','left')
            ->groupBy('catalog.item_id')
            ->select('*')
            ->paginate(15);
        return View::make('items.index', compact('items'));
    }

    public function var_index($item_id)
    {
        $catalogs= DB::table('catalog')
            ->where('item_id', $item_id)
            ->leftjoin('attributes as a1', 'catalog.attribute_id_1', '=', 'a1.attribute_id')
            ->leftjoin('attributes as a2', 'catalog.attribute_id_2', '=', 'a2.attribute_id')
            ->select('catalog.catalog_id','a1.attribute as a1','a2.attribute as a2','catalog.unit_cost','catalog.margin','catalog.sell_price','catalog.taxable')
             ->paginate(15);

        $item= DB::table('items')
            ->leftjoin('dimensions as d1', 'items.dim_id_1', '=', 'd1.dimension_id')
            ->leftjoin('dimensions as d2', 'items.dim_id_2', '=', 'd2.dimension_id')
            ->select('items.item_id', 'items.item','d1.dimension as dim1','d2.dimension as dim2')
            ->where('items.item_id', $item_id)->first();

        return View::make('items.var_index')->with( compact('catalogs'))->with(compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /items/create
     *
     * @return Response
     */
    public function create()
    {
        $dimension_optons = DB::table('dimensions')->orderBy('dimension_id', 'desc')->lists('dimension', 'dimension_id');
       return View::make('items.create', array('dimension_optons' => $dimension_optons));
    }

    /**
     * Store a newly created resource in storage.
     * POST /items
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_token');
        if (array_key_exists('dimension', $input)) {
            //variant Item
            if (count($input['dimension']) == 1) {
                // One Dimension
                $item_id = DB::table('items')->insertGetId(array('item' => $input['item'], 'department_id' => $input['department'], 'dim_id_1' => $input['dimension'][0]));
                $attributes = DB::select(DB::raw("SELECT a.attribute_id as attribute_id_1  FROM attributes a   WHERE a.dimension_id = :dim1 "),array('dim1' => $input['dimension'][0]));
                foreach ($attributes as $attribute)
                {
                    DB::table('catalog')->insert(array ('item_id' => $item_id,'unit_cost'=>$input['unit_cost'],'margin' => $input['margin'],'sell_price' => $input['sell_price'],'taxable' => $input['taxable']
                    ,'attribute_id_1'=>$attribute->attribute_id_1));
                }

            } elseif (count($input['dimension']) == 2) {
                // two dimensions present make cross join
                $item_id = DB::table('items')->insertGetId(array('item' => $input['item'], 'department_id' => $input['department'], 'dim_id_1' => $input['dimension'][0], 'dim_id_2' => $input['dimension'][1]));
                $attributes = DB::select(DB::raw("SELECT a.attribute_id as attribute_id_1, b.attribute_id as attribute_id_2
	                FROM attributes a cross join attributes b  WHERE a.dimension_id = :dim1 and b.dimension_id =  :dim2"),
                    array('dim1' => $input['dimension'][0], 'dim2' => $input['dimension'][1]));
                foreach ($attributes as $attribute)
                {
                    DB::table('catalog')->insert(array ('item_id' => $item_id,'unit_cost'=>$input['unit_cost'],'margin' => $input['margin'],'sell_price' => $input['sell_price'],'taxable' => $input['taxable']
                    ,'attribute_id_1'=>$attribute->attribute_id_1,'attribute_id_2'=>$attribute->attribute_id_2));
                }

            }
        } else {
            //standard Item;
            $item_id = DB::table('items')->insertGetId(array('item' => $input['item'], 'department_id' => $input['department']));
            DB::table('catalog')->insert(array ('item_id' => $item_id,'unit_cost'=>$input['unit_cost'],'margin' => $input['margin'],'sell_price' => $input['sell_price'],'taxable' => $input['taxable']));
        }
        return Redirect::to('items');
    }

    /**
     * Display the specified resource.
     * GET /items/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /items/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $catalog = DB::table('catalog')
            ->where('catalog_id',$id)
            ->join('items', 'catalog.item_id', '=', 'items.item_id')
            ->select('items.*','catalog.*')->first();
           return View::make('items.edit', compact('catalog'));
}

    /**
     * Update the specified resource in storage.
     * PUT /items/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /items/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}