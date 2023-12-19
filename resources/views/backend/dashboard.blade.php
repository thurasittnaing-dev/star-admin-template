@extends('backend.layouts.app')

@section('title',' | Dashboard')

@section('page','Admin Dashboard Panel')

@section('css')

@endsection

@section('content')
@endsection

@section('js')
<script>
    @if(Session::has('success'))

        toastSuccess('{{ Session::get('success') }}')
    @endif

    @if(Session::has('error'))
        toastError('{{ Session::get('error') }}')
    @endif
</script>
@endsection
