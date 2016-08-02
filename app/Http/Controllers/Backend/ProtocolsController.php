<?php
/**
 * Created by PhpStorm.
 * User: bvanbun
 * Date: 13/07/2016
 * Time: 12:02
 */

namespace app\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Protocols;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Excel;
use Schema;

/**
 * Class ProtocolsController
 * @package app\Http\Controllers\Backend
 */
class ProtocolsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $protocols = Protocols::all();
        return view('backend.protocols.index', compact('protocols'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $protocol = Protocols::find($id);
        //$columns = DB::getSchemaBuilder()->getColumnListing($protocol->table_name);
        $items = DB::table($protocol->table_name)->get();
        dd($items);
        return view('backend.protocols.edit', compact('protocol', 'items'));
    }

    public function create()
    {
        return view('backend.protocols.create');
    }

    public function preview(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:protocols,name|max:255',
            'csv-import' => 'required|mimes:csv,txt',
            'header' => 'required|string'
        ]);
        $filename = $request->file('csv-import')->getClientOriginalName();
        $path = $request->file('csv-import')->getRealPath();
        //dd($path);
        $data = Excel::load($path, function($reader) {
        })->get();
        //dd($data->toArray());
        $headers = $data[0]->keys()->all();
        $header_request = $request->header;
        $header_request = explode(",", $header_request);
        $correct_headers = true;
        foreach ($header_request as $header){
            if (!in_array(trim($header), $headers)) {
                $correct_headers = false;
            }
        }
        if (!$correct_headers){
            return redirect('admin/protocols/create')
                ->withErrors("Mismatch between headers given and headers found in file. Please try again")
                ->withInput();
        }
        $table_name = str_slug($request->name, "_");
        $name = $request->name;
        Schema::create($table_name, function(Blueprint $table) use($data)
        {
            $table->increments('id');
            foreach($data[0]->keys() as $key)
            {
                $table->string(str_slug($key, "_"));
            }
            $table->timestamps();
        });
        DB::table($table_name)->insert($data->toArray());
        return view('backend.protocols.preview', compact('data', 'name'));
    }

    public function store(Request $request)
    {

    }


}