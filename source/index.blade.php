@extends('_layouts.layout')

@section('main')
<div id="home" class="w-full h-screen flex flex-col items-center justify-center">
    <div class="h-32 flex justify-center items-center">
        <svg class="absolute w-32 h-32 overflow-visible text-awssat fill-current" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
            xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" version="1.1">
            <g class="logo-svg-group">
                <g class="logo-svg-colored">
                    <path class="logo-svg-outer" stroke-width="2"
                        d="M 29.855469,0.00126721 A 29.999999,29.999999 0 0 0 1.5914255e-7,30.001266 30,30 0 0 0 60,30.001266 29.999999,29.999999 0 0 0 29.855469,0.00126721 Z m 0.240234,7.41992139 a 22.579908,22.579908 0 0 1 22.484375,22.5800774 22.579908,22.579908 0 0 1 -45.1582024,0 A 22.579908,22.579908 0 0 1 30.095703,7.4211886 Z" />
                    <path class="logo-svg-inner" stroke-width="2"
                        d="m 29.834961,11.906314 a 18.096309,18.096309 0 0 0 -17.93164,18.095703 18.09668,18.09668 0 0 0 36.193359,0 18.096309,18.096309 0 0 0 -18.261719,-18.095703 z m -0.01367,7.552735 a 10.544895,10.544895 0 0 1 10.724609,10.542968 10.544922,10.544922 0 0 1 -21.089844,0 10.544895,10.544895 0 0 1 10.365235,-10.542968 z" />
                </g>
            </g>
        </svg>
    </div>
    <div class="pt-4">
        <h1 class="font-bold text-2xl base-home-title home-fade-in">Awssat</h1>
    </div>
    <div class="flex justify-center flex-col items-center home-slide-down">
        <div
            class="max-w-sm text-justify mt-4">
            <div class="base-home-desc text-lg px-8">
                An enthusiastic team that's eager to <span class="font-bold">build and design</span> beautiful web
                <em>stuff</em>.
            </div>
        </div>

        <div class="pt-12 w-full px-6 mx-auto">
            @include('_layouts.partial.side_menu', ['isHome' => true])
        </div>
    </div>

    <div class="font-bold base-home-footer absolute bottom-0 p-3 italic">
        Building a better web, we hope.
    </div>
</div>
@stop
