@extends('layouts.main')

@section('content')
<main class="blog-post">
    <div class="container justify-content-center">
        <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Пост создан {{(date('Y-m-d', strtotime($post->created_at)))}} в {{(date('H:i:s', strtotime($post->created_at)))}}</p>

        <section class="post-content">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-4 mb-3" data-aos="fade-up">
                    <img src="{{ url('storage/' . $post->main_image) }}" alt="blog post" class="img-fluid">
                </div>
            </div>
            @foreach ($comments as $comment)
            <blockquote data-aos="fade-up">
                <p>{{$comment->message}}</p>
            </blockquote>
            @endforeach
            <div class="row justify-content-center">
                <div>
                    <p>{{$post->content}}</p>
                </div>
            </div>
        </section>
        
        <div class="row justify-content-center">
            <div class="col-9 align-items-center">
                <section class="comment-section justify-content-center">
                    <h2 class="mb-5 ">Оставьте комментарий</h2>     
                    <form action="{{route('post.store')}}" method="POST" class="justify-content-center">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                            <label for="message" class="sr-only">Комментарий</label>
                            <textarea name="message" id="message" class="form-control" placeholder="Комментарий" rows="10"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
