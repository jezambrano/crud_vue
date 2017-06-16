@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h2> Vue Js </h2>
        <div id="app">

                 <router-link to="/productos" target="_self">
                  Productos
                 </router-link>
                  

                    <router-view class="view" transition="fade" ></router-view>

        </div>
    </div>
</div>
@endsection
