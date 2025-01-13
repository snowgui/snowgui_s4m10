<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\Book\BookRequest;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::all();
        
        if(session("del-error"))
        {
            $error = session()->get("error");
            return view("admin.book.index", compact("data", "error"));
        }else
        {
            return view("admin.book.index", compact('data'));
        } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.book.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $data = $request->all();
 
        if($data["start_date_read"] != null){
            $data["start_date_read"] = Carbon::createFromFormat('d/m/Y', $data["start_date_read"])->format('Y-m-d');
        }
    
        if($data["end_date_read"] != null){
            $data["end_date_read"] = Carbon::createFromFormat('d/m/Y', $data["end_date_read"])->format('Y-m-d');
        }

        if(isset($data["read"])) $data["read"] = true;
        else $data["read"] = false;

        Book::create($data);
        return redirect()->route("Book.index")->with("created", true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Book::find($id);

        return view("admin.book.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, $id)
    {
        $data = $request->all();  

        if($data["start_date_read"] != null){
            $data["start_date_read"] = Carbon::createFromFormat('d/m/Y', $data["start_date_read"])->format('Y-m-d');
        }
    
        if($data["end_date_read"] != null){
            $data["end_date_read"] = Carbon::createFromFormat('d/m/Y', $data["end_date_read"])->format('Y-m-d');
        }

        if(isset($data["read"])) $data["read"] = true;
        else $data["read"] = false;

        Book::find($id)->update($data);

        return redirect()->route("Book.edit", $id)->with("updated", true);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Book::find($id)->delete();
            return redirect()->route('Book.index')->with('destroyed', true);
        }catch(\Exception $ex)
        {
            $error = $ex->getCode();
           
            return redirect()->route('Book.index')
            ->with('del-error', true)
            ->with(compact('error'));
        }
    }
}
