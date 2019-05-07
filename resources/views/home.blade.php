@extends('layouts.app')
@section('header')
<div>
    <header-component></header-component>
</div>
@endsection
@section('content')
<!-- <api-doc-component></api-doc-component> -->
<div class="mt-4">
    <social-feed-view></social-feed-view>
</div>
@endsection