@extends('member_views.layout.client_app')


@section('title')
client dashboard
@endsection

@section('content')

@if (session()->has('error'))
<p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
@endif

@if (session()->has('success'))
<p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
@endif

@endsection

