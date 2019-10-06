@extends('layouts.app')

@section('content')
<ul id="sns-login-button-container">
    <li class="sns-login-button">
        <a class="login-twitter" href="/sns/twitter">Twitter</a>
    </li>
    <li class="sns-login-button">
        <a class="login-google" href="/sns/google">Google</a>
    </li>
</ul>
<div id="login-button-container">
{!! form($form) !!}
</div>

@endsection