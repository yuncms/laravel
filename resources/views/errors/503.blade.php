@extends('layouts.error')

@section('title', trans('auth.404'))

@section('body')
    <div class="box">
        <div class="clearfix">
            <h1>维护中</h1>
            <div class="p">
                {{ $exception->getMessage() }}
            </div>
        </div>
    </div>
@endsection
