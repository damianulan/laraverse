@extends('laraverse::layouts.master')
@section('content')
<x-markdown>{!! $page->getContents() !!}</x-markdown>

@endsection
