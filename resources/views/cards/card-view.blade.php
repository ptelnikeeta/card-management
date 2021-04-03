@extends('layouts.main.main')

@section('title', 'Card')
@section('content')
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name: <b>{{$card['name']}}</b></label>


                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="designation">Designation: <b>{{$card['designation']}}</b></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="business_name">Business Name: <b>{{$card['business_name']}}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Description: <b>{{$card['description']}}</b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="wp_number">WhatsApp Number: <b>{{$card['wp_number']}}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="contacts">Contacts: <b>{{$card['contacts']}}</b></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address: <b>{{$card['address']}}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Photo</label>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="">
                                        <img src="{{asset('storage'.$card['photo'])}}" alt="" height="250" width="250">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
