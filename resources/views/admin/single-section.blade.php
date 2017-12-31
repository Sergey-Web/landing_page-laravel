@extends('layouts.admin')

@section('header')
<h1>Section single-page</h1>
@endsection

@section('content')
<table class="table table-hover">
    <thead>
        <tr class="success">
            <th scope="col">#</th>
            @foreach($titleColumns as $nameColumn => $titleColumn)
            <th scope="col">{{ $nameColumn }}</th>
            @endforeach
            <th scope="col">delete</th>
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
<div class="btn-back">
    <a href="{{ route('admin') }}" class='btn btn-primary'>Back</a>
</div>
@endsection