@extends('layouts.main.main')

@section('title', 'Card')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        @if($id)
                            @include('cards.card-edit')
                        @else
                            @include('cards.card-create')
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                @include('cards.card-preview')
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                @include('cards.card-list')
            </div>
        </div>
    </div>
@stop
