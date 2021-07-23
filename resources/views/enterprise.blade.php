<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        	
        <link rel="stylesheet" href="css/bootstrap.min.css" />  

    </head>
    <body>


        <div class="container" style="margin-top:2%;">
            <div class="row" style="width:100%; border-bottom: 1px solid gray;">
                <div class="col-9" >
                    Litado de empresas creadas
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" style="margin-top:0%; margin-bottom: 10%;" data-toggle="modal" data-target="#modalEnterprise">Agregar</button>
                    
                </div>
            </div>
            @if($enterprises->count())
            <div class="row">
                <div class="col-12">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Rif</th>
                                <th>email</th>
                                <th>usarios registrados</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enterprises as $enterprise)
                            <tr>
                                <td>{{$enterprise->name}}</td>
                                <td>{{$enterprise->telefono}}</td>
                                <td>{{$enterprise->rif}}</td>
                                <td>{{$enterprise->email}}</td>
                                <td>{{$enterprise->people->count()}}</td>
                                <td>
                                    <button type="button" class="btn btn-success" style="margin-top:0%; margin-bottom: 10%;" data-toggle="modal" data-target="#modalUser" onclick="setDataModal({{$enterprise->id}})">
                                        <img src="img/person-plus.svg" alt="">
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
                    @else
                        <p style="text-align: center; color:#0d6efd"><strong>No se encontraron registros</strong></p>
                    @endif
                </div>
            </div>
        </div>


        <!-- Modal User -->
        <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog"  style="max-width: 50%; margin-top: 5%;">

                
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:none; background:white; margin-left:95%; margin-top:-5%;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row" style="width:80%; backgroud:red;">
                            <div class="col-4" >
                                <img src="img/userAdd.png" style="width:150px; height:150px; margin-top:70%; margin-left:25%">
                            </div>
                            <div class="col-8">
                                
                                <form style="margin-left:10%;" method="post" action="{{ url('person/nuevo') }}">
                                    {{ csrf_field() }}
                                    <p style="text-align: center; color:#0d6efd"><h3 style="color:#0d6efd; text-align: center;">REGISTRO USUARIO</h3></p>
                                    <p style="text-align: center; color:#B2B1B1">Datos básicos del usuario</p>  
                                    

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="text" class="form-control" id="idEmpresa" name="idEmpresa" hidden>
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre y apellido" name="name" required pattern="[a-zA-Z ]{2,50}">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo: name@example.com" name="email">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <div class="row">
                                            <div class="col-3">
                                                <select class="form-control" id="inlineFormCustomSelectPref" name="typeRif">
                                                    <option value="1">J</option>
                                                    <option value="2">E</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Rif:" name="rif">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="telf:0424#######" name="telefono">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña" name="password" minlength="5" maxlength="8" required>
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Repita la contraseña" name="passwordB" minlength="5" maxlength="8" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" style="margin-top:5%;">Siguiente</button>
                                
                                </form>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       <!-- Modal enterprise -->
        <div class="modal fade" id="modalEnterprise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog"  style="max-width: 50%; margin-top: 5%;">

                
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:none; background:white; margin-left:95%; margin-top:-5%;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row" style="width:80%; backgroud:red;">
                            <div class="col-4" >
                                <img src="img/AddEmpresa.png" style="width:150px; height:150px; margin-top:70%; margin-left:25%">
                            </div>
                            <div class="col-8">
                                
                                <form style="margin-left:10%;" method="post" action="{{ url('enterprise/nuevo') }}">
                                    {{ csrf_field() }}
                                    <p style="text-align: center; color:#0d6efd"><h3 style="color:#0d6efd; text-align: center;">REGISTRO EMPRESA</h3></p>
                                    <p style="text-align: center; color:#B2B1B1">Datos básicos de la empresa</p>  
                                    
                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre de la empresa" name="name">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="telf:0424#######" name="telefono">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo: name@example.com" name="email">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Dirección de la empresa" name="direccion">
                                    </div>

                                    <div class="form-group" style="margin-top:5%;">
                                        <div class="row">
                                            <div class="col-3">
                                                <select class="form-control" id="inlineFormCustomSelectPref" name="typeRif">
                                                    <option value="1">J</option>
                                                    <option value="2">E</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Rif:" name="rif">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    
                                    <p style="text-align: justify; color:#B2B1B1">En caso de ser usuario delegado de la empresa por favor adjunte la autorización. Haga click <a href="">aqui</a> para descargar el formato </p>

                                    <button type="submit" class="btn btn-primary" style="margin-top:5%;">Siguiente</button>
                                
                                </form>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function setDataModal(id) {
                $('#idEmpresa').val(id);
                }
        </script>
        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
