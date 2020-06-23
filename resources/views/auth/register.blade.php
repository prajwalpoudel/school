@extends('layouts.master')
@section('content')
    <div class="m-content">
        <register :roles="{{ json_encode(getRoles()->toArray()) }}"></register>
    </div>
@endsection
