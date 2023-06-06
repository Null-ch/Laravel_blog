@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Панель администратора</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Карточка Пользователей -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Пользователи</p>
                                <h3>{{ $users->count() }}</h3>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="small-box-footer">Перейти к пользователям<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                    <!-- Карточка Постов -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Посты</p>
                                <h3>{{ $posts->count() }}</h3>
                            </div>
                            <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Перейти к постам<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                    {{-- Карточка категорий --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Категории</p>
                                <h3>{{ $category->count() }}</h3>
                            </div>
                            {{-- <div class="icon">
                                <i class="fa-thin fa-list"></i>
                            </div> --}}
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">Перейти к категориям<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                    <!-- Карточка тегов -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Теги</p>
                                <h3>{{ $tag->count() }}</h3>
                            </div>
                            <a href="{{ route('admin.tag.index') }}" class="small-box-footer">Перейти к тегам<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
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
