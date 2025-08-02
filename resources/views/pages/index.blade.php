@extends('laraverse::layouts.master')
@section('content')
{{-- @markdown {{ $page->getContents() }} @endmarkdown --}}

{!! $page->getHtml() !!}

@endsection
