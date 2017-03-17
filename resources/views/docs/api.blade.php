@extends('layouts.app')

@section('content')
    <div class="col-xs-12">
        <h1 class="text-center">
            @lang('api.api')
        </h1>

        <hr />

        <h2 class="text-center">
            @lang('api.use')
        </h2>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            Esta API funciona mediante un servidor OAuth, así que para poder usarla, primero hay que realizar una petición a la URL <a href="{{url('oauth/token')}}">{{url('oauth/token')}}</a>
                            mediante el método <b>POST</b> con los siguientes parámetros y valores:
                        </p>

                        <div class="text-center">
                            <code>
                                {{json_encode(['grant_type' => 'password', 'username' => 'your email', 'password' => 'your password', 'scope' => '*', 'client_id' => 'client_id application', 'client_secret' => 'client_secret application'])}}
                            </code>
                        </div>

                        <p>
                            El <b>client_id</b> y el <b>client_secret</b> actual son:
                        </p>

                        <ul>
                            <li>
                                <b>
                                    client_id:
                                </b>
                                <code>
                                    {{DB::table('oauth_clients')->where('password_client', 1)->first()->id}}
                                </code>
                            </li>
                            <li>
                                <b>
                                    client_secret:
                                </b>
                                <code>
                                    {{DB::table('oauth_clients')->where('password_client', 1)->first()->secret}}
                                </code>
                            </li>
                        </ul>

                        <p>
                            Una vez realizado esto habrá una respuesta con un token de acceso (access_token), este token
                            es necesario almacenarlo para realizar las posteriores peticiones.
                        </p>

                        <p>
                            Cuando queramos realizar una petición es necesario añadir una cabecera <b>Authorization</b> de la siguiente forma:
                        </p>

                        <div class="text-center">
                            <code>
                                Bearer "access_token"
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center">
            @lang('api.users')
        </h2>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    @lang('api.method')
                                </th>
                                <th class="text-center">
                                    @lang('api.url')
                                </th>
                                <th class="text-center">
                                    @lang('api.description')
                                </th>
                                <th class="text-center">
                                    @lang('api.parameters')
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    GET
                                </td>
                                <td>
                                    <a href="{{route('api.user.me')}}">
                                        {{route('api.user.me')}}
                                    </a>
                                </td>
                                <td>
                                    @lang('api.information_about_me')
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    GET
                                </td>
                                <td>
                                    <a href="{{route('api.user.bikes')}}">
                                        {{route('api.user.bikes')}}
                                    </a>
                                </td>
                                <td>
                                    @lang('api.my_bikes')
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h2 class="text-center">
            @lang('api.bikes')
        </h2>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">
                                @lang('api.method')
                            </th>
                            <th class="text-center">
                                @lang('api.url')
                            </th>
                            <th class="text-center">
                                @lang('api.description')
                            </th>
                            <th class="text-center">
                                @lang('api.parameters')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td>
                                GET
                            </td>
                            <td>
                                <a href="{{route('api.bikes.index')}}">
                                    {{route('api.bikes.index')}}
                                </a>
                            </td>
                            <td>
                                @lang('api.motorcycles_listed')
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                GET
                            </td>
                            <td>
                                <a href="{{route('api.bikes.show', ['bike' => 1])}}">
                                    {{route('api.bikes.show', ['bike' => 1])}}
                                </a>
                            </td>
                            <td>
                                @lang('api.show_motorcycle', ['id' => 1])
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                POST
                            </td>
                            <td>
                                <a href="{{route('api.bikes.store')}}">
                                    {{route('api.bikes.store')}}
                                </a>
                            </td>
                            <td>
                                @lang('api.store_motorcycle')
                            </td>
                            <td class="text-left">
                                <ul>
                                    <li>
                                        <b>
                                            branch
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Marca de la moto (Honda)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                String
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            model
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Modelo de la moto (Shadow)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                String
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            engine
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Motor de la moto (750)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                String
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                PUT
                            </td>
                            <td>
                                <a href="{{route('api.bikes.update', ['bike' => 1])}}">
                                    {{route('api.bikes.update', ['bike' => 1])}}
                                </a>
                            </td>
                            <td>
                                @lang('api.update_motorcycle', ['id' => 1])
                            </td>
                            <td class="text-left">
                                <ul>
                                    <li>
                                        <b>
                                            branch
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Marca de la moto (Honda)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                String
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            model
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Modelo de la moto (Shadow)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                String
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            engine
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Motor de la moto (750)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                String
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                DELETE
                            </td>
                            <td>
                                <a href="{{route('api.bikes.destroy', ['bike' => 1])}}">
                                    {{route('api.bikes.destroy', ['bike' => 1])}}
                                </a>
                            </td>
                            <td>
                                @lang('api.destroy_motorcycle', ['id' => 1])
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h2 class="text-center">
            @lang('api.consumptions')
        </h2>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">
                                @lang('api.method')
                            </th>
                            <th class="text-center">
                                @lang('api.url')
                            </th>
                            <th class="text-center">
                                @lang('api.description')
                            </th>
                            <th class="text-center">
                                @lang('api.parameters')
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td>
                                POST
                            </td>
                            <td>
                                <a href="{{route('api.consumptions.store', ['bike' => 1])}}">
                                    {{route('api.consumptions.store', ['bike' => 1])}}
                                </a>
                            </td>
                            <td>
                                @lang('api.store_consumption', ['id' => 1])
                            </td>
                            <td class="text-left">
                                <ul>
                                    <li>
                                        <b>
                                            km
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Kilómetros recorridos (150.2)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Numeric
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            liters
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Litros que ha consumido (10.2)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Numeric
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            driving_type
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Tipo de conducción (mixed)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Enum (urban, mixed, highway)
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            passenger
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                ¿Llevabas pasajero? (yes)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Enum (yes, no)
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                PUT
                            </td>
                            <td>
                                <a href="{{route('api.consumptions.update', ['bike' => 1, 'consumption' => 2])}}">
                                    {{route('api.consumptions.update', ['bike' => 1, 'consumption' => 2])}}
                                </a>
                            </td>
                            <td>
                                @lang('api.update_consumption', ['bike' => 1, 'consumption' => 2])
                            </td>
                            <td class="text-left">
                                <ul>
                                    <li>
                                        <b>
                                            km
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Kilómetros recorridos (150.2)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Numeric
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            liters
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Litros que ha consumido (10.2)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Numeric
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            driving_type
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                Tipo de conducción (mixed)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Enum (urban, mixed, highway)
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <b>
                                            passenger
                                        </b>
                                        <ul>
                                            <li>
                                                <b>
                                                    Descripción:
                                                </b>
                                                ¿Llevabas pasajero? (yes)
                                            </li>
                                            <li>
                                                <b>
                                                    Tipo:
                                                </b>
                                                Enum (yes, no)
                                            </li>
                                            <li>
                                                <b>
                                                    Restrinciones:
                                                </b>
                                                Requerido
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                DELETE
                            </td>
                            <td>
                                <a href="{{route('api.consumptions.delete', ['bike' => 1, 'consumption' => 2])}}">
                                    {{route('api.consumptions.delete', ['bike' => 1, 'consumption' => 2])}}
                                </a>
                            </td>
                            <td>
                                @lang('api.destroy_consumption', ['bike' => 1, 'consumption' => 2])
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection