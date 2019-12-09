<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Animal;
use Validator;

class animalController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal = Animal::all();
        return $this->sendResponse($animal->toArray(), 'Todos los animales mostrados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'nombre' => 'required|unique:animales,nombre'
        ]);

        if($validator->fails()){
            return $this->sendErrorResponse('Validation Error.',$validator->errors());
        }

        $animal = Animal::create($input);

        return $this->sendResponse($animal->toArray(), 'Animal creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);

        if (is_null($animal)) {
            return $this->sendError('Animal no encontrado');
        }


        return $this->sendResponse($animal->toArray(), 'Animal encontrado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'nombre' => 'required|unique:animales,nombre'
        ]);

        if($validator->fails()){
            return $this->sendErrorResponse('Validation Error.',$validator->errors());
        }
         $animal=Animal::where('id', $id)->update($request->all());
        return $this->sendDone('Animal creado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal=Animal::where('id', $id);
        $animal->delete();
        return $this->sendResponse([], 'Eliminado correctamente');
    }
}
