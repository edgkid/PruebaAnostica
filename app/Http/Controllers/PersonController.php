<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\User;

class PersonController extends Controller
{

    private $codeMessage;
    private $message;

    public function __construct()
    {
        $codeMessage = 'warning';
        $message = 'Ocurrio un problema con la operación, intentlo de nuevo.';
    }


    public function save(Request $request)
    {

        if($request->password == $request->passwordB){
            
            $person = new Person();


            $person->name = (isset(explode ( " ",$request->name )[1] ))? explode ( " ",$request->name )[0] : "" ;
            $person->lastName = (isset(explode ( " ",$request->name )[1]))? explode ( " ",$request->name )[1] : "" ; 
            
            $person->telefono = $request->telefono;
            $person->email = $request->email;
            $person->rif = $request->rif;
            $person->email = $request->email;
            $person->password = $request->password;
            $person->enterprise_id = $request->idEmpresa;
    
            $operationResult = $person->save();
    
            if ($operationResult){
                $this->codeMessage = 'info';
                $this->message = 'El nuevo regitro fue actualizado con exito.';
            }

        }

        return redirect('/')->with($this->codeMessage, $this->message);

    }
}
