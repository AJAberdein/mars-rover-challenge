<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link href="{{ asset('css/grids/col.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/2cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/3cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/4cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/5cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/6cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/7cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/8cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/9cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/10cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/11cols.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grids/12cols.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: calc(100vh - 400px);
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                text-align:center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            p {
                margin: 7px;
            }

            .grid-container {
              grid-template-columns: auto auto auto;
              background-color: #3498db;
              padding: 15px;
              margin: 15px;
            }
            .grid-item {
              background-color: rgba(255, 255, 255, 0.8);
              position: relative;
              height: 80px;
            }

            /*.rover-form {*/
                .field {
                    width:80% !important;
                    font-size: 16px;
                    height: 120px;
                    /*border: 2px;*/
                }
                
            /*}*/


            .block-info {
                position: absolute;
                bottom: 0px;
                right: 0px;
            }

            .fa-rocket {
                position: absolute;
                margin-left: 10px;
                margin-top: 25px;
            }


        </style>
    </head>
    <body>

        <div style="width:50%; display: inline-block;">
              <h1 class="flex-center">Mars Rover Challenge</h3>
            <h2 class="flex-center">Platform45</h3>
            <p class="flex-center">by AJAberdein</p>
            <p class="flex-center">Source Code available on&nbsp;<i class="fa fa-github"></i>&nbsp;&nbsp;<a  href="https://github.com/AJAberdein/mars-rover-challenge" target="_blank">Github</a></p>
        </div>
      

        <div style="width:49%; display: inline-block;">
            <h3>Run your Mars Rover Instructions here:</h3>
            {{ Form::open(array('url' => 'map/update', 'class'=>'rover-form')) }}
                {{ Form::textArea(
                    'input', 
                    $input,
                    array(  'class' => 'field', 
                            'id' => 'input',
                            'placeholder' => '5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM')
                    ) }}

                         {{ Form::submit() }}

            {{ Form::close() }}
        </div>
        @if($grid_error)
            <h3 class="flex-center">(oops! adding a hieght or width over 11 will break the grid 🙈)</h3>
        @endif


            <div class="grid-container">
                
                @for ($i = $x; $i >= 0; $i--)
                    <div class="section group">
                        @for ($j = 0; $j <= $y; $j++)
                            <div class="grid-item col span_1_of_{{$y + 1}}">
                
                                @if(isset($map))

                                    @foreach($map->getRovers() as $rover)
                                        @if($rover->x == $j && $rover->y == $i )
                                            <i style="position: absolute" class="fa fa-rocket fa-3x"></i>
                                            <p style="float:right"><strong>({{$rover->x}}, {{$rover->y}}, {{$rover->direction}})</strong></p>
                                        @endif
                                     @endforeach
                                @endif
                                <p class="block-info">({{$j}}, {{$i}})</p>
                            </div>
                         @endfor  
                    </div>

                @endfor
            </div>

        </div>
    </body>
</html>
