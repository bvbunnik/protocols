<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Protocols;
use DB;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $protocol1 = Protocols::where('id', '1')->get();
        $table_columns = json_decode($protocol1[0]['table_columns']);
        return view('frontend.index', compact('protocol1', 'table_columns'));
    }

    public function getProtocol($protocol)
    {
        $protocol1 = Protocols::where('table_name', $protocol)->get();
        $table_columns = json_decode($protocol1[0]['table_columns']);

        return view('frontend.index', compact('protocol1', 'table_columns'));
    }

    public function getData(Request $request)
    {
        $protocol = $request->get('protocol');
        $datatables = app('datatables');
        $columns = DB::getSchemaBuilder()->getColumnListing($protocol);
        $selected_cols = array_slice($columns, 1,count($columns)-3);
        $items = DB::table($protocol)->select($selected_cols);
        return $datatables->queryBuilder($items)->make(false);
    }
}
