@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button data-target="#modal1" data-toggle="modal" class="btn btn-primary">
                            <strong>+ Proyecto</strong>
                        </button>
                        <div class="modal" id="modal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Crear proyecto
                                    </div>
                                    <form action="{{route('proyecto.store')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <label for="nombre">Nombre:</label>
                                            <input id="nombre" name="nombre" class="form-control" type="text" required>
                                            <div class="form-group">
                                                <button class="btn btn-danger">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nombre}}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{url('proyecto/'.$item->id.'/edit')}}">Editar</a>
                                            <a class="btn btn-success" href="{{url('proyecto/'.$item->id)}}">Ver</a>

                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/proyecto', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete proyecto',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
