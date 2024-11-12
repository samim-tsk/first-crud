@extends('layouts.admin')

@section('content')
<x-page-header title="Dashboard"/>
<div class="container-fluid">
    <div class="card-group">
        <x-card title="Categories" count="{{ __($categories) }}"/>
        <x-card title="Brands" count="{{ __($brands) }}"/>
    </div>
    <div class="row">
    
    </div>
</div>
@endsection