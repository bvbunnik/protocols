<?php


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

        $path = $request->file('csv-import')->getRealPath();

        $data = Excel::load($path, function($reader) {})->get();

        //Check if header given and header in file match up

        $headers = $data[0]->keys()->all();
        $header_request = explode(",", $request->header);
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

        //Create the table to hold the data
        $table_name = str_slug($request->name, "_");
        Schema::create($table_name, function(Blueprint $table) use($data)
        {
            $table->increments('id');
            foreach($data[0]->keys() as $key)
            {
                $table->string(str_slug($key, "_"));
            }
            $table->timestamps();
        });
        //Insert data
        DB::table($table_name)->insert($data->toArray());

        //Create administrative record
        $table_columns = array('columns' => $headers);
        $name = $request->name;
        Protocols::create(['name'=>$name, 'table_name' => $table_name, 'table_columns' => json_encode($table_columns)]);

        //All went well, redirect to index with success message
        return redirect()->route('admin.protocols.index')->withFlashSuccess('Protocol created successfully!');

    }

    public function destroy($id)
    {
        //Look up the protocol
        $protocol = Protocols::findOrFail($id);
        //Delete the table
        Schema::dropIfExists($protocol->table_name);
        //Drop the row in the administrative table
        $protocol->delete();

        //Redirect to index
        return redirect()->route('admin.protocols.index')->withFlashSuccess('Protocol deleted successfully!');
    }
}