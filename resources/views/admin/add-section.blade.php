@extends('layouts.admin')

@section('header')
<h1>Create</h1>
@endsection

@section('content')

<form action="{{ route($nameSection.'.create') }}" enctype="multipart/form-data" method="POST">
    
</form>

<div class="wrap-btn-back">
    <a href="{{ route('admin') }}" class='btn btn-primary'>Back</a>
</div>
@endsection