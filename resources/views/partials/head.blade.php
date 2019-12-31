<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <base href="{{url('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Test Todo App</title>
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
