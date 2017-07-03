<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Correspondencia;

class CorrespondenciaController extends Controller
{

    public function CorrespondenciaHome() {
        
        //date_default_timezone_set('America/Mexico_City');

        $correspondencias = Correspondencia::select()->get();
        return view('correspondencia.home')->with(compact('correspondencias'));
    }
    public function CorrespondenciaStore(Request $request) {

        $correspondencia = New Correspondencia;

        $correspondencia->valor = $request->input('valor');
        $correspondencia->save();

        $correspondencias = correspondencia::all();
        $status = 'Nuevo registro creado';

        return redirect()->route('correspondencia')->with(compact('status') );
    }
    public function CorrespondenciaEdit($id) {

        $correspondencia = correspondencia::find($id);
        $correspondencias = correspondencia::select()->get();

        return view('correspondencia.home')->with(compact('correspondencia','correspondencias'));
    }
    public function correspondenciaUpdate(Request $request, $id) {

        $correspondencia = correspondencia::find($id);
        $correspondencia->valor = $request->input('valor');
        $correspondencia->update();
        
        $correspondencias = correspondencia::select()->get();
        $status = 'Registro actulizado';

        return redirect()->route('correspondencia')->with(compact('status'));
    }
    public function CorrespondenciaDelete($id) {

        $correspondencia = correspondencia::find($id);
        $correspondencia->delete();
        $status = 'Registro eliminado';

        return redirect()->route('correspondencia')->with(compact('status'));
    }

}
