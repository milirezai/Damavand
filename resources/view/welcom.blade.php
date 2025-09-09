@extends('layouts.app')

@section('head-tag')
    <title>Welcome</title>
@endsection

@section('content')

    <div id="main">
        <div class="fof">
            <h1>Welcome to <a href="https://github.com/milirezai/Monarch">Monarch</a> Framework</h1>
        </div>
    </div>

        <form id="main" action="<?= route('home.upload') ?>" method="post" enctype="multipart/form-data" id="form">

        <input type="file" name="image">
        <button type="submit">dave</button>
    </form>

@endsection
