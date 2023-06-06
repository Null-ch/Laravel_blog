@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h3 class="m-0 mr-2">{{ $post->title }}</h3>
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                                <td>
                                    <form action="{{ route('admin.post.delete', $post->id) }} "
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-white">
                                            <i class="fas fa-trash text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </td>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            {{-- <li class="breadcrumb-item active">Dashboard v1</li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>Название</td>
                                            <td>Содержимое поста</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->content }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
@endsection
