@extends('layouts.base')

@section('content')

  <div class="alert alert-danger" role="alert">
    Invalid auth token !!!
    <a href="https://accounts.zoho.eu/oauth/v2/auth?scope={{$scope}}&client_id={{$client_id}}&response_type=code&access_type=offline&redirect_uri={{$redirect_uri}}" class="alert-link">Please confirm your role.</a>
  </div>

@stop
