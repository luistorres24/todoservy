@extends('layouts.general')
@section('title', 'Todoservy')
@section('styles')
    <style>
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .titulo {
            /*font-family: "Arial Rounded MT Bold", "Helvetica Rounded", Arial, sans-serif;*/
            text-transform: uppercase;
            display: block;
            font-size: 3rem;
            /*color: #0094ff;*/
            color: #1B1B1B;
            /*text-shadow: 0 2px 3px #1fc5be, 0 -2px 1px #fff;*/
            font-weight: bold;
            letter-spacing: -4px;
            text-align: center;
        }
        @media (max-width: 767px){
            .titulo{
                font-size: 2rem;
            }
        }

        body,html {
            height: 100%;
        }
        body {
            background-color: #f6f6f6;
        }


    </style>
@endsection

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <img src="{{ asset('img/todoservy_banner.png') }}" alt=""  style="width: 100%; border-radius: 20px;">
            </div>

            <div class="col-md-12" >

                <div style="text-align: center">
                    <span class="titulo">EJERCICIO PRACTICO TODOSERVY</span>
                    <p>
                        Hola, mi nombre es <strong>Luis Miguel Torres Bolaños</strong> y presento el proyecto propuesto para aspirar al cargo "Desarrollador Web full stack" en TodoServy.
                    </p>
                </div>

            </div>
        </div>

    </div>

{{--    <div class="body flex-grow-1 px-3">--}}
{{--        <div class="container-lg">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <img src="{{ asset('img/todoservy_banner.png') }}" alt=""  style="width: 100%">--}}
{{--                </div>--}}
{{--                    <div class="col-md-12" >--}}
{{--                        <h1>Holaa</h1>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
