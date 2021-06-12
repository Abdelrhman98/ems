@extends('layouts.app')
@section('title' ,'منظومة إدارة المعدات')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @userType('admin')
                <div class="card-body">
                    {{ __('admin') }}
                 </div>
                @elseuserType('user')
                <div class="card-body">
                    {{ __('user') }}
                 </div>
                @enduserType
                @guest

                @endguest

            </div>
        </div>
    </div>
</div>
@endsection
