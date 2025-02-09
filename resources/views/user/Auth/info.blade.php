@extends ('user.layout.master')

@section('content')
@include('user.error')
    <form action="{{url('/profile')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="">Your Name</label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Your email</label>
            <input type="text" value="{{$user->email}}" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Your Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{$user->image}}" alt="{{$user->name}}" style="width:50px;border-radius:10%" alt=""/>
        </div>
        <input type="submit" value="Update" class="btn btn-sm btn-primary" id="">
    </form>

@endsection