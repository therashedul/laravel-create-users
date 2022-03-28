@extends('layouts.deshboard')
@section('content')
    <div class="container">
        <div class="justify-content-center">

            <div class="card">
                <div class="card-header">Create SiteUrl
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('index') }}">Site Url</a>
                    </span>
                </div>

                <div class="card-body">
                    {!! Form::model($site, ['route' => ['update', $site->id], 'method' => 'PATCH']) !!}
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Url:</strong>
                        {!! Form::text('url', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Code:</strong>
                        {!! Form::text('code', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
