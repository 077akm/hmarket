@extends('layouts.adm')

@section('title', 'Users Page')

@section('content')
    <h1>MESSAGE BOT PAGE</h1>



    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Message</th>
            <th scope="col">Time</th>
            <th scope="col">Email</th>
            <th scope="col">Пол</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($messages as $message)
        <tr>
            <td>
                <input type="checkbox" name="selected_messages[]" value="{{ $message->id }}">
            </td>
            <th scope="row">{{ $message->id }}</th>
            <td>{{ $message->user->name }}</td>
            <td>{{ $message->content }}</td>
            <td>{{ $message->created_at }}</td>
            <td>{{ $message->user->email }}</td>
            <td>{{ $message->user->gender }}</td>
            <td>
                <form action="{{ route('adm.chatdelete', ['messageId' => $message->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


    <script>
        // Assuming you're using jQuery for simplicity
        $(document).ready(function () {
            $(".delete-button").click(function () {
                var messageId = $(this).data("message-id");

                // You can use AJAX to send a request to the server to delete the message
                $.ajax({
                    method: "DELETE",
                    url: "/messages/" + messageId, // Adjust the URL to match your server route
                    success: function () {
                        // If the message is successfully deleted, you can remove the corresponding table row
                        $("tr[data-message-id='" + messageId + "']").remove();
                    },
                    error: function (error) {
                        console.error("Error deleting message: ", error);
                    }
                });
            });
        });
    </script>
@endsection
