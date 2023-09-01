@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')


       <div class="container" style="padding-top: 20px">
           <div class="row justify-content-center">
               <div class="col-md-10">

                   <form action="{{route('documents.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                           <label for="nameInput">{{__('bet.producname')}}</label>
                           <input type="text" class="form-control" id="nameInput" name="name" placeholder="{{__('bet.producname')}}">
                           @error('name')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="numberInput">{{__('bet.number')}}</label>
                           <input type="number" class="form-control" id="numberInput" name="number" placeholder="+7(XXX) XXX XX XX">
                           @error('number')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>


                       <div class="form-group">
                           <label for="PKBInput">{{ __('bet.pkb') }}</label>
                           <input type="file" class="form-control" name="PKB_otchet[]">
                           @error('PKB_otchet')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div id="additionalFilesContainer"></div>

                       <div class="form-group mt-3">
                           <button type="button" class="btn btn-dark" onclick="addFileInput()">{{ __('Добавить файл') }}</button>
                       </div>

                       <div class="form-group">
                           <label for="ZeinetInput">{{ __('bet.zeinet') }}</label>
                           <input type="file" class="form-control" name="Zeinet_Aqy[]">
                           @error('Zeinet Aqy')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div id="additionalFilesContainer1"></div>

                       <div class="form-group mt-3">
                           <button type="button" class="btn btn-dark" onclick="addFileInput1()">{{ __('Добавить файл') }}</button>
                       </div>

                       <div class="form-group">
                           <label for="NekeInput">{{ __('bet.neke') }}</label>
                           <input type="file" class="form-control" name="Neke_anyktama[]">
                           @error('Neke anyktama')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div id="additionalFilesContainer2"></div>

                       <div class="form-group mt-3">
                           <button type="button" class="btn btn-dark" onclick="addFileInput2()">{{ __('Добавить файл') }}</button>
                       </div>

                       <div class="form-group">
                           <label for="BalaInput">{{ __('bet.bala') }}</label>
                           <input type="file" class="form-control" name="Bala_tizimi[]">
                           @error('Bala tizimi')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div id="additionalFilesContainer3"></div>

                       <div class="form-group mt-3">
                           <button type="button" class="btn btn-dark" onclick="addFileInput3()">{{ __('Добавить файл') }}</button>
                       </div>

                       <div class="form-group">
                           <label for="KualikInput">{{ __('bet.kualik') }}</label>
                           <input type="file" class="form-control" name="Kualik[]">
                           @error('Kualik')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div id="additionalFilesContainer4"></div>

                       <div class="form-group mt-3">
                           <button type="button" class="btn btn-dark" onclick="addFileInput4()">{{ __('Добавить файл') }}</button>
                       </div>


                       <div class="form-group">
                           <label for="contentInput">{{__('bet.content1')}}</label>
                           <input type="text" class="form-control" id="contentInput" name="content">
                           @error('content')
                           <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                       </div>


                       <div class="form-group mt-3">
                           <button class="btn btn-outline-success" type="submit">{{__('bet.send')}}</button>
                       </div>

                   </form>


               </div>
           </div>
       </div>

       <script>
           function addFileInput() {
               const additionalFilesContainer = document.getElementById("additionalFilesContainer");
               const newFileInput = document.createElement("input");
               newFileInput.type = "file";
               newFileInput.className = "form-control d-flex";
               newFileInput.name = "PKB_otchet[]";
               const closeButton = document.createElement("button");
               closeButton.type = "button";
               closeButton.className = "btn btn-outline-danger btn-sm mt-2 ml-2";
               closeButton.innerHTML = "Закрыть";
               closeButton.addEventListener("click", function() {
                   additionalFilesContainer.removeChild(newFileInput);
                   additionalFilesContainer.removeChild(closeButton);
               });
               additionalFilesContainer.appendChild(newFileInput);
               additionalFilesContainer.appendChild(closeButton);
           }
           function addFileInput1() {
               const additionalFilesContainer = document.getElementById("additionalFilesContainer1");
               const newFileInput = document.createElement("input");
               newFileInput.type = "file";
               newFileInput.className = "form-control";
               newFileInput.name = "Zeinet_Aqy[]";
               const closeButton = document.createElement("button");
               closeButton.type = "button";
               closeButton.className = "btn btn-outline-danger btn-sm ml-2";
               closeButton.innerHTML = "Закрыть";
               closeButton.addEventListener("click", function() {
                   additionalFilesContainer.removeChild(newFileInput);
                   additionalFilesContainer.removeChild(closeButton);
               });
               additionalFilesContainer.appendChild(newFileInput);
               additionalFilesContainer.appendChild(closeButton);
           }
           function addFileInput2() {
               const additionalFilesContainer = document.getElementById("additionalFilesContainer2");
               const newFileInput = document.createElement("input");
               newFileInput.type = "file";
               newFileInput.className = "form-control";
               newFileInput.name = "Neke_anyktama[]";
               const closeButton = document.createElement("button");
               closeButton.type = "button";
               closeButton.className = "btn btn-outline-danger btn-sm ml-2";
               closeButton.innerHTML = "Закрыть";
               closeButton.addEventListener("click", function() {
                   additionalFilesContainer.removeChild(newFileInput);
                   additionalFilesContainer.removeChild(closeButton);
               });
               additionalFilesContainer.appendChild(newFileInput);
               additionalFilesContainer.appendChild(closeButton);
           }
           function addFileInput3() {
               const additionalFilesContainer = document.getElementById("additionalFilesContainer3");
               const newFileInput = document.createElement("input");
               newFileInput.type = "file";
               newFileInput.className = "form-control";
               newFileInput.name = "Bala_tizimi[]";
               const closeButton = document.createElement("button");
               closeButton.type = "button";
               closeButton.className = "btn btn-outline-danger btn-sm ml-2";
               closeButton.innerHTML = "Закрыть";
               closeButton.addEventListener("click", function() {
                   additionalFilesContainer.removeChild(newFileInput);
                   additionalFilesContainer.removeChild(closeButton);
               });
               additionalFilesContainer.appendChild(newFileInput);
               additionalFilesContainer.appendChild(closeButton);
           }
           function addFileInput4() {
               const additionalFilesContainer = document.getElementById("additionalFilesContainer4");
               const newFileInput = document.createElement("input");
               newFileInput.type = "file";
               newFileInput.className = "form-control";
               newFileInput.name = "Kualik[]";
               const closeButton = document.createElement("button");
               closeButton.type = "button";
               closeButton.className = "btn btn-outline-danger btn-sm ml-2";
               closeButton.innerHTML = "Закрыть";
               closeButton.addEventListener("click", function() {
                   additionalFilesContainer.removeChild(newFileInput);
                   additionalFilesContainer.removeChild(closeButton);
               });
               additionalFilesContainer.appendChild(newFileInput);
               additionalFilesContainer.appendChild(closeButton);
           }
       </script>
@endsection

