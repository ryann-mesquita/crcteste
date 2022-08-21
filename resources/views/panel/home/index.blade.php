@extends('panel.layouts.app')

@section('content')


    <div class ="content-din bg-white">
        <div class="pull-right" ><p><b>{{$response['name'] .','. $response['sys']['country'] . " - " . $response['weather'][0]['description'] }}</b></p></div>
        <div class="content-din bg-white">
            <div class="card">
                <div class="card-body">

                    <form class="form" name="form_cadastro">
                        <div class="form-control alert alert-danger messageBox" role="alert" style="display: none;">

                        </div>
                        @csrf
        
                        @include('panel._partials.form')
                    </form>
                </div>
            </div>
            <div class="title-pg">
                <h1 class="title-pg">Ultimos Cadastrados</h1>
            </div>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Data</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF/CNPJ</th>
                            <th>Telefone</th>
                            <th>Mensagem</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->data }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->cpfcnpj }}
                                </td>
                                <td>
                                    {{ $user->telefone }}
                                </td>
                                <td>
                                    {{ $user->mensagem }}
                                </td>
                                
                                <td style="width=10px;">
                                    <a href="" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></i></a>
                                    <a href="" class="btn btn-info"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#confirm"aria-hidden="true"></span></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>  
    </div>  
@endsection