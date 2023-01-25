<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <style>
    .pagination {
        float: right;
        margin-top: 10px;
    }
    </style>

</head>

<body>
    @include('sweetalert::alert')

    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <h2 class="d-flex justify-content-center mt-5"> Blog Details</h2>
    <div class="d-flex justify-content-center  p-3">


        <div class="card" style="width: 1200px;">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Blog sl</th>
                        <th scope="col">Blog title</th>
                        <th scope="col">Blog Description</th>
                        <th scope="col">Created At</th>
                        <th scope="col"></th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach($blogs as $blog)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>
                            <a href="{{ url('blog'.'/')}}" class="btn btn-success"> Add</a>
                        </td>
                        <td>
                            <a href="{{ url('blog/edit'.'/'.$blog->id)}}" class="btn btn-info">Edit </a>
                        </td>
                        <td>
                            <a href="{{ url('blog/delete'.'/'.$blog->id)}}" class="btn btn-danger"> Delete</a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="col-md-12" style="text-align:right; height: 10px">{!! $blogs->links() !!}</div>
            <!--<div class="d-flex">
                {!! $blogs->links() !!}
            </div>-->
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>