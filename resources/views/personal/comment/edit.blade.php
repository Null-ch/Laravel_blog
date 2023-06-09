@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h3>Редактирование комментария</h3>
                        <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Комментарий</label>
                                <input type="text" class="form-control" name="title" placeholder="Текст комментария"
                                    value="{{ $comment->message }}">
                                @error('title')
                                    <div class="text-danger"> Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-2" value="Обновить">
                        </form>
                    </div>
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
