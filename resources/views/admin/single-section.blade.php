@extends('layouts.admin')

@section('header')
<h1>Section {{ $nameSection }}</h1>
@endsection

@section('content')

@if (session('access'))
<div class="alert alert-success">
    <span>{{ session('access') }}</span>
</div>
@endif

<div class="wrap-btn-add">
    <a href="{{ route($nameSection.'.create') }}" class="btn btn-success">Create New</a>
</div>
@if($sections != FALSE)
<table class="table table-hover">
    <thead class="table-head">
        <tr class="success table-head__row">
            <th class="table-head__col">#</th>
            @foreach($titleColumns as $titleColumn)
            <th class="table-head__col">{{ $titleColumn }}</th>
            @endforeach
            <th class="table-head__col--edit">edit</th>
            <th class="table-head__col--del">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sections as $keySection => $section)
        <tr class="table-body__row">
            <td class="table-body__col">{{ $keySection + 1 }}</td>
        @foreach($section as $keySection => $item)
                    @if($keySection == 'id')
                        @continue
                    @endif
            <td class="table-body__col">{{ $item }}</td>
        @endforeach
            <td class="table-body__col">
                <a href="#" class="btn btn-info">Edit</a>
            </td>
            <td class="table-body__col">
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
@else
<h3>EMPTY SECTION</h3>
@endif
<div class="wrap-btn-back">
    <a href="{{ route('admin') }}" class='btn btn-primary'>Back</a>
</div>
@endsection