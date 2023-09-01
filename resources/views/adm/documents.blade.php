@extends('layouts.adm')

@section('title', 'Items PAGE')

@section('content')

    <div class="container" style="margin-top: 20px">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">Все</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Ожидание</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">Подтвержденные</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Отклоненные</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach($documents as $document)
                        <div class="col mb-4">
                            <div class="card" style="width: 350px">
                                <img src="{{$document->user->avatar}}" class="card-img-top" style="width: 350px">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold">{{$document->name}}</h4>
                                    <hr>
                                    <p class="card-text">{{$document->content}}</p>
                                    <div class="d-grid gap-2 col-6 mx-auto d-flex">
                                        @can('delete', $document)
                                            <form action="{{route('documents.destroy', $document->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                            </form>
                                        @endcan
                                        <a class="btn btn-dark" href="{{route('documents.show', $document->id)}}">Қарау</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach($documents as $document1)
                    @if($document1->user->approval_status === 'ожидает_подтверждения')

                            <div class="col mb-4">
                                <div class="card" style="width: 350px">
                                    <img src="{{$document1->user->avatar}}" class="card-img-top" style="width: 350px">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="row-cols-1">
                                                <h4 class="card-title fw-bold">{{$document1->name}}</h4>
                                            </div>
                                            <div class="row-cols-2" align="right">
                                                <svg style="margin-left: 5px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="card-text">{{$document1->content}}</p>
                                        <div class="d-grid gap-2 col-6 mx-auto d-flex">
                                            @can('delete', $document1)
                                                <form action="{{route('documents.destroy', $document1->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                                </form>
                                            @endcan
                                            <a class="btn btn-dark" href="{{route('documents.show', $document1->id)}}">Қарау</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach($documents as $document2)
                        @if($document2->user->approval_status === 'Подтверждено')

                            <div class="col mb-4">
                                <div class="card" style="width: 350px">
                                    <img src="{{$document2->user->avatar}}" class="card-img-top" style="width: 350px">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="row-cols-1">
                                                <h4 class="card-title fw-bold">{{$document2->name}}</h4>
                                            </div>
                                            <div class="row-cols-2" align="right">
                                                <svg style="color: green; margin-left: 5px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="card-text">{{$document2->content}}</p>
                                        <div class="d-grid gap-2 col-6 mx-auto d-flex">
                                            @can('delete', $document2)
                                                <form action="{{route('documents.destroy', $document2->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                                </form>
                                            @endcan
                                            <a class="btn btn-dark" href="{{route('documents.show', $document2->id)}}">Қарау</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach($documents as $document3)
                        @if($document3->user->approval_status === 'Отклонено')

                            <div class="col mb-4">
                                <div class="card" style="width: 350px">
                                    <img src="{{$document3->user->avatar}}" class="card-img-top" style="width: 350px">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="row-cols-1">
                                                <h4 class="card-title fw-bold">{{$document3->name}}</h4>
                                            </div>
                                            <div class="row-cols-2" align="right">
                                                <svg style="margin-left: 5px; color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="card-text">{{$document3->content}}</p>
                                        <div class="d-grid gap-2 col-6 mx-auto d-flex">
                                            @can('delete', $document3)
                                                <form action="{{route('documents.destroy', $document3->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                                </form>
                                            @endcan
                                            <a class="btn btn-dark" href="{{route('documents.show', $document3->id)}}">Қарау</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>





    <div class="container" style="margin-top: 20px">
        <div class="row row-cols-1 row-cols-md-3 g-3">

        </div>
    </div>
    <script>
        const tabs = document.querySelectorAll('.nav-link');
        const tabContents = document.querySelectorAll('.tab-pane');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                tabContents.forEach(tc => tc.classList.remove('show', 'active'));
                tabContents[index].classList.add('show', 'active');
            });
        });
    </script>



@endsection
