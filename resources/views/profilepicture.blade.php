@extends('nav')

@section('content')
    <h2>Profile Picture</h2>
    <div class="row">
        <div class="col-md-12">
            <form action="/uploadpicture" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-50 ">
                    <label for="profile_picture">Upload Profile Picture</label>
                    <input type="file" class="form-control" name="profile_picture" id="profile_picture" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
@endsection