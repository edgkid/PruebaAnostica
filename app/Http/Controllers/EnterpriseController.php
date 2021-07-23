<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enterprise;

class EnterpriseController extends Controller
{

    private $codeMessage;
    private $message;

    public function __construct()
    {
        $codeMessage = 'warning';
        $message = 'Ocurrio un problema con la operación, intentlo de nuevo.';
    }

    public function  index(){

        $enterprises = Enterprise::orderBy('name')->paginate(3);
        return view('enterprise',compact('enterprises'));
        
    }

    public function create()
    {
        //
    }

    
    public function save(Request $request)
    {

        $newsEnterprise = new Enterprise();
        $newsEnterprise->name = $request->name;
        $newsEnterprise->rif = $request->rif;
        $newsEnterprise->telefono = $request->telefono;
        $newsEnterprise->email = $request->email;
        $newsEnterprise->direccion = $request->direccion;

        $operationResult = $newsEnterprise->save();

        if ($operationResult){
            $this->codeMessage = 'info';
            $this->message = 'El nuevo regitro fue guardado con exito.';
        }

        return redirect('/')->with($this->codeMessage, $this->message);

    }
}
