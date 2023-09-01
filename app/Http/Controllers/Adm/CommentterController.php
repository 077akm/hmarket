<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CommentterController extends Controller
{
    public function showComments(){
        $comments = Comment::all();
        return view('adm.comments', ['comments' => $comments]);
    }
}
