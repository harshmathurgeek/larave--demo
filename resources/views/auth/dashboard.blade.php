@extends('auth.layouts')
@section('content')
    <h1> Welcome {{ Auth::user()->name }}</h1>
