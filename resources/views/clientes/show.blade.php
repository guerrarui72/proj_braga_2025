@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Ficha do cliente - <b> {{ $cliente->nome }}</b></h4>
                        <a href="{{ route('clientes.edit', $cliente->id) }}"><button type="button"
                            class="btn btn-warning">Editar</button></a>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{dd($clientes)}}; --}}


                        <table class="table table-striped table-dark">

                            <tr>
                                <th scope="row">Id:</th>
                                <td>{{ $cliente->id }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Nome:</th>
                                <td>{{ $cliente->nome }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Morada:</th>
                                <td>{{ $cliente->morada }}</td>

                            </tr>

                            <tr>
                                <th scope="row">Telefone:</th>
                                <td>{{ $cliente->telefone }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td>{{ $cliente->email }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Data Nascimento:</th>
                                <td>{{ $cliente->data_nascimento }}</td>

                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
