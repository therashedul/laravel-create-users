@extends('layouts.deshboard')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Site Url
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('create') }}">Add Site Url</a>
                    </span>
                </div>
                <div class="card-body">


                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Code</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $site)
                                <tr>
                                    <td>{{ $site->id }}</td>
                                    <td>{{ $site->name }}</td>
                                    <td>{{ $site->url }}</td>
                                    <td>{{ $site->code }}</td>

                                    <td>
                                        <a class="btn btn-success" href="{{ route('show', $site->id) }}"><i
                                                class="fa fa-eye" aria-hidden="true"></i></a>

                                        <a class="btn btn-primary" href="{{ route('edit', $site->id) }}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></a>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['destroy', $site->id], 'style' => 'display:inline']) !!}
                                        {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger','type' => 'submit']) }}
                                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
