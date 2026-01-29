<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateDulceRequest;
use App\Models\DulceModel;
use Illuminate\Http\Request;
use App\TraitDulce;


class DulceController extends Controller
{
    use TraitDulce;

    public function create(CreateDulceRequest $request){
        $dulcemodel = DulceModel::create([
            'juguete_id'=>$request->juguete_id,
            'nombre_dulce'=>$request->nombre_dulce,
            'color_dulce'=>$request->color_dulce,
            'marca_dulce'=>$request->marca_dulce
        ]);
      
        return $this->ApiResponse($dulcemodel, 'dulce creado correctamente', null, 200);

        // $response = Http::withoutVerufying()->post(env('ngrok'),[
          //  'macota_id'=>$request->dulce_id,
            //'nombre_juguete'=>$request->nombre_juguete,
           // 'color_juguete'=>$request->color_juguete,
            //'edad_juguete'=>$request->edad_juguete,
        //])
    }

    public function index($id){
        $dulcemodel = DulceModel::where('juguete_id', '=', $id)->first();
        if(!$dulcemodel){
            return $this->ApiResponse(null, 'no se encontro el dulce del perrete', null, 200);
        }
        return $this->ApiResponse($dulcemodel, 'se encontro el dulce del perrete', null, 200);
    }
}
