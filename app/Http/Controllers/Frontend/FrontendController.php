<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Combined;
use App\Models\Transport;
use App\Models\Food;
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
        return view('frontend.index');
    }

    public function vectors()
    {
        return view('frontend.vectors');
    }

    public function transport()
    {
        return view('frontend.transport');
    }

    public function food()
    {
        return view('frontend.food');
    }

    public function getData(Request $request)
    {
        //dd($protocol);
        $datatables = app('datatables');
        switch ($request->get('protocol')) {
            case "combined":
                $protocols = Combined::select(['type', 'host_species', 'diagnosis', 'disease', 'pathogen_type', 'pathogen_species', 'protocols', 'source', 'comments', 'notifiable']);
                return $datatables->eloquent($protocols)->make(true);
                break;
            case "vector":
                $protocols = Vector::select(['vector', 'vector_scientific_name', 'species', 'target_pathogen','pathogen_scientific_name', 'disease','protocols', 'source']);
                return $datatables->eloquent($protocols)->make(true);
                break;
            case "transport":
                $protocols = Transport::select(['host', 'type', 'title', 'protocols', 'source']);
                return $datatables->eloquent($protocols)->make(true);
                break;
            case "food":
                $protocols = Food::select(['host', 'food_item', 'live_dead', 'matrix','target_pathogen','scientific_name', 'protocols', 'source', 'comments']);
                return $datatables->eloquent($protocols)->make(true);
                break;
        }
    }


    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
