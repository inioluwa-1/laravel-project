@extends('nav')

@section('content')
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users and their notes</h3>
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                @foreach($users as $user)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">{{ $user->name }} (ID: {{ $user->id }})</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <h5 class="card-title">Notes</h5>
                            <ul class="list-group">
                                @if($user->keepnotes->count() > 0)
                                    @foreach($user->keepnotes as $note)
                                        <li class="list-group-item">
                                            <h6 class="card-title">Note-Id: {{ $note->id }} (User ID: {{ $note->user_id }})</h6>
                                            <p><strong>Title:</strong> {{ $note->title }}</p>
                                            <p><strong>Content:</strong> {{ $note->content }}</p>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item">No notes</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No users</p>
            @endif
        </div>
    </div>
    <h2>User that keep notes</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Email</th>
                        <th>Note ID</th>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @foreach($user->keepnotes as $note)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $note->id }}</td>
                                <td>{{ $note->title }}</td>
                                <td>{{ $note->content }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection