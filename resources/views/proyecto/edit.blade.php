@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('proyecto.update',$proyecto->id) }}" role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <label>Nombre:</label>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm"
                                               value="{{$proyecto->nombre}}">
                                    </div>
                                </div>
                            </div>

                            <center><div class="col-xs-6 col-sm-6 col-md-6">
                                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">

                                </div></center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
