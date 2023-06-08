@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
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
                                <p>Понравившиеся посты</p>
                                <h3>11</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-heart"></i>
                            </div>
                            <a href="{{route('personal.liked.index')}}" class="small-box-footer">Перейти к понравившимся постам<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                    {{-- Карточка категорий --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Комментарии</p>
                                <h3>11</h3>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-comment"></i>
                            </div>
                            <a href="{{route('personal.comment.index')}}" class="small-box-footer">Перейти к коментариям<i
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
