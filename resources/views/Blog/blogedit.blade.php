<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    @include('sweetalert::alert')

    <h2 class="d-flex justify-content-center mt-5">Edit Blog details</h2>
    <div class="d-flex justify-content-center  p-3">


        <form action="{{ url('blog/update/'.$editing->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Blog Title</label>
                <input type="text" class="form-control  {{ $errors->has('title') ? 'error' : '' }}" id="title"
                    value="{{ $editing -> title }}" name="title">
                @if ($errors->has('title'))
                <div class="error" style="color: red">
                    {{ $errors->first('title') }}
                </div>

                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Blog Description</label>
                <input type="text" class="form-control {{ $errors->has('description') ? 'error' : '' }}"
                    value="{{ $editing -> description }}" id="description" name="description" rows="4">
                @if ($errors->has('description'))
                <div class="error" style="color: red">
                    {{ $errors->first('description') }}
                </div>
                @endif
            </div>
            <div class="mb-3" style="text-align:center;">
                <button type="submit" class="btn btn-primary">Submit Blog deatils</button>
            </div>

            <div></div>
        </form>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
</body>

</html>