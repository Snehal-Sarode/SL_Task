@extends("layout")


@section("title","Edit Form")

@section("content")
      <br>
        <div class="container">            
            <!-- <hr> -->
            <a  class="btn btn-primary float-sm-right text-white" style="margin: -7px;"  href="{{ route('laraform.index')}}"><i class="fas fa-list-ul"></i>&nbsp List Applications</a>          
            <h3 style="text-align: center;">Edit Form</h3>
            <hr>
            
        <form method="POST" action="{{route('laraform.update', $data->id)}}" enctype="multipart/form-data">
        @csrf 
        @method("put")
            <div class="form-row">
                <div class="form-group col-md-6">
                <label >First Name</label><span style="color:#ff0000">*</span>
                <input type="text" class="form-control @error('firstname')change_bg @enderror" name="firstname"  placeholder="Enter Firstname" value="{{$data->firstname}}">
                @error('firstname')
                <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                @enderror
            </div>

                <div class="form-group col-md-6">
                <label >Last Name</label><span style="color:#ff0000">*</span>
                <input type="text" class="form-control @error('firstname')change_bg @enderror" name="lastname"  placeholder="Enter Lastname"  value="{{$data->lastname}}">
                @error('lastname')
                <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label><span style="color:#ff0000">*</span>
                <input type="text" class="form-control @error('firstname')change_bg @enderror" id="inputEmail4" name="email"  placeholder="Enter Email"  value="{{$data->email}}">
                @error('email')
                <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                @enderror
            </div>
                <div class="form-group col-md-6">
                <label>Mobile No.</label><span style="color:#ff0000">*</span>
                <input type="text" class="form-control @error('firstname')change_bg @enderror" name="mobile"  placeholder="Enter Mobile No." value="{{$data->mobile}}">
                @error('mobile')
                <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="form-group">
                <label>Talk Title</label><span style="color:#ff0000">*</span>
                <input type="text" class="form-control @error('talk_title')change_bg @enderror" placeholder="Enter Talk Title" name="talk_title" value="{{$data->talk_title}}">
                @error('talk_title')
                <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Profile Photo</label><span style="color:#ff0000">*</span><br>
                <img style="height: 80px; width: 150px;" src="{{asset('images/'.$data->image)}}"><br><br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image')change_bg @enderror" id="file-upload" name="image">
                    <label class="custom-file-label" for="file-upload" aria-describedby="inputGroupFileAddon02">{{ $data->image }}<div id="file-upload-filename"></div></label>
                </div>
                @error('image')
                    <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                @enderror
            </div>
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <input type="submit" class="btn btn-primary" value="Submit">
            </form>            
        </div>
@endsection
   