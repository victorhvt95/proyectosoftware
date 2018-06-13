@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tus proyectos</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form class="form-group" method="POST" action="{{ route('proyecto.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <button type="submit" class="btn btn-sm btn-primary col-md-2">
                                        Crear
                                    </button>

                                    <input id="nombre" type="text" name="nombre" placeholder="Nombre..."
                                           value="{{ old('nombre') }}" required autofocus>
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif

                                    <input id="clave" type="password" name="clave" placeholder="clave"
                                           required>
                                    @if ($errors->has('clave'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clave') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </form>
                            <br>
                        <div class="col-md-12">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <th>id</th>
                                <th>nombre</th>
                                <th>Operaciones</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nombre}}</td>
                                        <td>
                                            <a class="btn btn-danger" href="{{route('proyecto.show',[$item->id])}}">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$proyectos->render()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
