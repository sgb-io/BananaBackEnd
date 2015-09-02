<?php

namespace App\Http\Controllers;

use App\Sweety;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

class SweetyController extends Controller
{
    private $sweetyFilters = [
        'all' => ['fruit', 'dinner', 'snack'],
        'fruit' => ['fruit'],
        'dinner' => ['dinner'],
        'snack' => ['snack'],
        'daytime' => ['fruit', 'snack']
    ];

    /**
     * Display a listing of the resource.
     * @param type The type of sweet to filter by: all/fruit/dinner/snack/daytime
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $permittedType = ($request->has('type')) ? $this->sweetyFilters[$request->input('type')] : $this->sweetyFilters['all'];
        return JsonResponse::create(Sweety::whereIn('type', $permittedType)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sweet = new Sweety($request->all());
        $sweet->save();

        return JsonResponse::create($sweet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return JsonResponse::create(Sweety::findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Sweety::findOrFail($id)->delete();
    }
}
