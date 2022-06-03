@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>This is your control center</h1>
@stop

@section('content')
    <p>Welcome to CHS beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop