<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\gato;
use Validator;


class GatosController extends BaseController
{
    /*
    Prueba
    */
    public function search($query)
    {
        $gato = gato::where('nombre','LIKE',"%{$query}%")->get();
        if (count($gato)<1){
            return $this->sendError('No se encotraron coicidencias');
        }
        return $this->sendResponse($gato->toArray(), 'Encontrado '.count($gato));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gatos = gato::all();
        return $this->sendResponse($gatos->toArray(), 'todos los gatos mostrados');
    }


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
            'nombre' => 'required',
            'color' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $gato = gato::create($input);


        return $this->sendResponse($gato->toArray(), 'gato created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gato = gato::find($id);


        if (is_null($gato)) {
            return $this->sendError('gato not found.');
        }


        return $this->sendResponse($gato->toArray(), 'gato retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gato $gato)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'nombre' => 'required',
            'color' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $gato->nombre = $input['nombre'];
        $gato->color = $input['color'];
        $gato->save();


        return $this->sendResponse($gato->toArray(), 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(gato $gato)
    {
        $gato->delete();
        return $this->sendResponse($gato->toArray(), 'gato deleted successfully.');
    }
}