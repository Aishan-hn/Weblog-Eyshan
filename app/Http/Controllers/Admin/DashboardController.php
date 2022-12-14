<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
   public function index()
   {
      $categories = Category::count();
      $posts = Post::count();
      $users = User::where('role_as','0')->count();
      $admins = User::where('role_as','1')->count();
  
   return view('Admin.dashboard', compact('categories','posts','users','admins'));
   }
}
