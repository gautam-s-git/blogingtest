<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background: #eee
        }

        .date {
            font-size: 11px
        }

        .comment-text {
            font-size: 12px
        }

        .fs-12 {
            font-size: 12px
        }

        .shadow-none {
            box-shadow: none
        }

        .name {
            color: #007bff
        }

        .cursor:hover {
            color: blue
        }

        .cursor {
            cursor: pointer
        }

        .textarea {
            resize: none
        }

        .comment{
            border:2px solid red;
        }

    </style>
    <title>Document</title>
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
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{ asset('images/author.jpg') }}" width="40">
                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{ $post->author->name }}</span><span class="date text-black-50">Shared publicly - {{ date('M Y',strtotime($post->created_at)) }}</span></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text">{{ $post->content }}</p>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                        </div>
                    </div>
                    <div class="bg-light p-2">
                        <form action="{{ route('post.add.comment',['slug'=>$post->slug]) }}" method="post" id="comment_form">
                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{ asset('images/author.jpg') }}" width="40"><textarea class="form-control ml-1 shadow-none textarea" id="comment" name="content"></textarea></div>
                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" id="commnet_add" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @forelse($post->comments as $comment)
    <div class="container mt-5 mb-2">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{ asset('images/author.jpg') }}" width="40">
                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{ $comment->user->name }}</span><span class="date text-black-50">Shared publicly - {{ date('M Y',strtotime($comment->created_at)) }}</span></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text">{{ $comment->content }}</p>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
    @empty
    <div class="container mt-5 mb-2">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{ asset('images/author.jpg') }}" width="40">
                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">First Comment</span><span class="date text-black-50">{{ date('d-m-Y') }}</span></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text">Be first to Comment</p>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 
    @endforelse
   
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.j"></script>

    <script>
        $(document).on('keyup','textarea',function(){
            ('#comment').removeClass('comment');
        });
        $(function(){
            $(document).on('click','#commnet_add',function(){
             let commnet=$('#comment').val();
             if(commnet==""){
                $('#comment').addClass('comment');
                return false;
             }
             $('#comment_form')[0].submit();
            });
        })
    </script>
</body>
</html>
