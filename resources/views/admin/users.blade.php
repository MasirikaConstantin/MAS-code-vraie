@extends('admin.base')

@section('section', 'Admin site')
@section('titre', 'AdminBase')
@section('contenus')

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:users-list>
        </div>
    </div>

    @endsection
