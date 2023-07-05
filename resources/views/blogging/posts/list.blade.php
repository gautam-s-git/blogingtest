<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Post List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .content-header{
            width: 426px;
        }
    </style>
</head>
<body>
    <section class="container mt-4">
        <div class="header row">
         <h3 class="col-6">
          List of posts
         </h3>
         <div class="col-6 float-right">
            <div class="row">
                <div class="user col-6">
                    <i class="fa fa-user"></i><span class="mx-2">{{ Auth::user()->name }}</span>
                </div>
                <a href="{{ route('post.create') }}" class="btn btn-info col-3 mb-2">Create post</a>
                <a href="{{ route('user.signout') }}" class="btn btn-warning col-2 mb-2 mx-2">Logout</a>
            
             </div>
            </div>
        </div>
    </section>
    <section class="container content">
        <table class="table table-striped table-bordered">
            <thead>
             <tr>
                <th>Author</th>
                <th>Title</th>
                <th class="content-header">Post</th>
                <th>TotalComment</th>
                <th>Create_at</th>
                <th>Action</th> 
             </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="content">{{ $post->content }}</td>
                    <td>{{ $post->comment_count }}</td>
                    <td>{{ date('d M y',strtotime($post->created_at)) }}</td>
                    <td>
                        <div>
                            <a href="{{ route('post.edit',['slug'=>$post->slug]) }}" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('post.view',['slug'=>$post->slug]) }}" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
                             <a href="{{ route('post.delete',['slug'=>$post->slug]) }}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                   </tr>
                @empty
                <tr>
                    <td>Doe Henry</td>
                    <td>Climate Chnage</td>
                    <td>Right Now Climate Chage is Big Issue...</td>
                    <td>8</td>
                    <td>05-07-2023</td>
                    <td>
                        <div>
                            <a href="" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-info btn-circle"><i class="fa fa-eye"></i></a>
                             <a href="" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                   </tr>
                @endforelse
            
            </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>