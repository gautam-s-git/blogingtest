<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="container mt-4">
        <div class="header row">
         <h3 class="col-6">
          Update Post
         </h3>
         <div class="col-6 float-right">
            <div class="row">
                <div class="user col-6">
                    <i class="fa fa-user"></i><span class="mx-2">{{ Auth::user()->name }}</span>
                </div>
                <a href="{{ route('post.list') }}" class="btn btn-info col-3 mb-2">Post List</a>
                <a href="{{ route('user.signout') }}" class="btn btn-warning col-2 mb-2 mx-2">Logout</a>
            
             </div>
            </div>
        </div>
    </section>
    <section class="container content">
       <div class="card">
         <div class="card-header">
          <span class="card-title">Edit Post</span>
         </div>
         <div class="card-body">
            <form method="post" action="{{ route('post.update',['slug'=>$post->slug]) }}">
                <div class="form-group">
                 <label class="form-label">Post Title</label>
                 <input type="text" class="form-control" name="title" id="" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Post Content</label>
                     <textarea name="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
                   </div>
                   <div class="form-group">
                    <button type="submit" class="btn btn-info m-3">Update</button>
                   </div>
                   @csrf
            </form>
         </div>
       </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>