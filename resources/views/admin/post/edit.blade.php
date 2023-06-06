@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Админ панель</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h3>Редактирование поста</h3>
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="w-25"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                    value="{{ $post->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                    <<div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Добавление превью</label>
                        <div class="w-50 mb-3">
                            <img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                            @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Добавление основного изображения</label>
                        <div class="w-50 mb-3">
                            <img src="{{ url('storage/' . $post->main_image) }}" alt="preview_image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                            @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Выберите категорию</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Теги</label>
                        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги"
                            data-dropdown-css-class="select2" style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option
                                    {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
    </div>
    </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2023.</strong>
        All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
@endsection
