@extends('layouts.admin')

@section('header')
    <h1 class="title">Admin Panel</h1>
    <h2 class="subtitle">Section page:</h2>
@endsection

@section('content')
    <a href="{{ route('pages.index') }}" class="section btn btn-primary">Single-Page</a>
    <a href="{{ route('services.index') }}" class="section btn btn-primary">Services</a>
    <a href="{{ route('portfolio.index') }}" class="section btn btn-primary">Portfolio</a>
    <a href="{{ route('employees.index') }}" class="section btn btn-primary">Employees</a>
@endsection