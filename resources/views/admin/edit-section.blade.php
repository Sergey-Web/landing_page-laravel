@extends('layouts.admin')

@section('header')
<h1>Create</h1>
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="wrap-btn-back">
    <a href="{{ route('admin') }}" class='btn btn-primary'>Back</a>
</div>

<form class="form-edit" action="{{ route($nameSection.'.update', $id) }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @foreach($arrData as $keyColumn => $column)
        @include('admin.handler-field-edit')
    @endforeach
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection