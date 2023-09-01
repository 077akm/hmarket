@extends('layouts.adm')

@section('content')

    <div class="container" >
        <div class="container">
            <div class="card mb-3" style="max-width: 1500px;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <h4 class="text-center mt-5">ПКБ ФАЙЛДАР</h4>
                        @foreach ($item->pkbFiles as $file)
                            <img src="{{ asset($file->path) }}" class="img-fluid rounded-start">
                            <hr>
                        @endforeach
                        <h4 class="text-center">Зейнет ақы</h4>
                            @foreach ($item->zeinetFiles as $file)
                                <img src="{{ asset($file->path) }}" class="img-fluid rounded-start">
                                <hr>
                            @endforeach
                        <h4 class="text-center">Неке анықтамалары</h4>
                            @foreach ($item->nekeFiles as $file)
                                <img src="{{ asset($file->path) }}" class="img-fluid rounded-start">
                                <hr>
                            @endforeach
                        <h4 class="text-center">Бала тізімі</h4>
                            @foreach ($item->balaFiles as $file)
                                <img src="{{ asset($file->path) }}" class="img-fluid rounded-start">
                                <hr>
                            @endforeach
                        <h4 class="text-center">Жеке куәлік</h4>
                            @foreach ($item->kualikFiles as $file)
                                <img src="{{ asset($file->path) }}" class="img-fluid rounded-start">
                                <hr>
                            @endforeach
                        <!-- Аналогично для других столбцов файлов -->
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2 class="card-title display-5 form-control">Аты-жөні: {{$item->name}}</h2><br>
                            <h4 class="display-5 form-control">Электрондық почтасы: {{$item->user->email}}</h4><br>
                            <h4 class="display-5 form-control">Байланыс нөмірі: {{$item->number}}</h4><br>
                            <h4 class="display-5 form-control">{{__('bet.content1')}}: {{$item->content}}</h4><br>
                            <div class="d-flex">
                                <div class="row-cols-2" s>
                                    <a href="{{ route('adm.documents') }}" class="btn btn-dark">
                                        АРТҚА ҚАЙТУ
                                    </a>
                                </div>
                                <div class="row-cols-1">
                                    <form action="{{route('documents.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="margin-left: 15px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button><br>
                                    </form>
                                </div><br>
                            </div><hr>
                            <h5>Решение одобрение документов</h5><hr>
                            <div class="row-cols-2">
                                @if ($item->user->approval_status === 'ожидает_подтверждения')
                                    <form method="post" action="{{ route('documents.approve', $item->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success" name="approval_status" value="Подтверждено">Подтвердить</button>
                                        <button type="submit" class="btn btn-danger" name="approval_status" value="Отклонено">Отклонить</button>
                                    </form>
                                @elseif($item->user->approval_status === 'Подтверждено')
                                    <div class="d-flex">
                                        <div class="row-cols-1" style="margin-top: 5px">
                                            <h4 style="margin-right: 5px">{{ $item->user->approval_status }}</h4>
                                        </div>
                                        <div class="row-cols-2">
                                            <svg color="green" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                            </svg>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex">
                                        <div class="row-cols-1" style="margin-top: 5px">
                                            <h4 style="margin-right: 5px">{{ $item->user->approval_status }}</h4>
                                        </div>
                                        <div class="row-cols-2">
                                            <svg color="red" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        </div>


@endsection



