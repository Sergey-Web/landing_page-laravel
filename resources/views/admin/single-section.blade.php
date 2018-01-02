@extends('layouts.admin')

@section('header')
<h1>Section single-page</h1>
@endsection

@section('content')
<div class="wrap-btn-add">
    <a href="{{ route($nameSection.'.create') }}" class="btn btn-success">Create New</a>
</div>
<table class="table table-hover">
    <thead>
        <tr class="success">
            <th>#</th>
            @foreach($titleColumns as $nameColumn => $titleColumn)
            <th>{{ $nameColumn }}</th>
            @endforeach
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $keySection => $section)
        <tr>
            <th scope="row">{{ $keySection + 1 }}</th>
            @foreach($section as $keySection => $item)
                @if($keySection == 'id')
                    @continue
                @endif
            <td>{{ $item }}</td>
            @endforeach
            <td>
                <a href="#" class="btn btn-info">Edit</a>
            </td>
            <td>
                <form action="{{ route($nameSection.'.destroy', $section['id']) }}" accept-charset="UTF-8" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                   <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="wrap-btn-back">
    <a href="{{ route('admin') }}" class='btn btn-primary'>Back</a>
</div>
@endsection