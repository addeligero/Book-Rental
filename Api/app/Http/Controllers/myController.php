<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kani;
use App\Models\Borrower;
use App\Models\Borrowed_book;
use App\Models\Book;
use App\Models\User;


class myController extends Controller
{
    function displayAll(){
        return DB::select('SELECT * FROM kanis');
    }

    function spec($id){
        // Corrected string interpolation
        return DB::select("SELECT * FROM kanis WHERE id = '{$id}'");
    }
    
    function add(Request $req ){
     $user= new Kani;
     $user->id=$req->id;
     $user->ngalan=$req->ngalan;
     $result=$user->save();
     if ($result){
        return["noice ka dol"];
     }
     else{
        return["atay"];
     }

    }
// diri sugod
public function allBorrowers() {
    $borrowers = DB::select('SELECT * FROM borrowers');
    return response()->json($borrowers);
}

 
    function allBooks(){
        return DB::select('SELECT * FROM books');
        return response()->json($books);

    }

    function borrowed(){
        return  DB::select('SELECT brwd.id, brwr.borrower_name, b.book_name
        FROM borrowed_books brwd
        INNER JOIN borrowers brwr ON brwd.borrower_id = brwr.id
        INNER JOIN books b ON brwd.book_id = b.id;
        ');
   
    }
    function addbook(Request $req) {
        $book = new Book;
        $book->book_name = $req->book_name;
        $result = $book->save();
        if ($result) {
            return response()->json(["message" => "Book added successfully"]);
        } else {
            return response()->json(["message" => "Failed to add book"], 500);
        }
    }
    
       function addborrower(Request $req ){
        $user= new Borrower;
        $user->borrower_name=$req->borrower_name;
        $result=$user->save();
        if ($result){
           return["noice ka dol"];
        }
        else{
           return["atay"];
        }
   
       }
       function addborrowedbooks(Request $req ){
        $user= new Borrowed_book;
        $user->borrower_id=$req->borrower_id;
        $user->book_id=$req->book_id;
        $result=$user->save();
        if ($result){
           return["noice ka dol"];
        }
        else{
           return["atay"];
        }
   
       }
       
       //diri mag check
       public function login(Request $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');

        $user = DB::table('users')->where('username', $username)->first();

        if ($user && $user->password == $password) {
            return response()->json(['message' => 'Login successful', 'user' => $user]);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
