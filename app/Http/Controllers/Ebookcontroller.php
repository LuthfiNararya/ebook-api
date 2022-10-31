<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ebook;
class Ebookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebook = ebook::all();
        return $ebook;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Ebook::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "date_of_issue" => $request->date_of_issue
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ebook = ebook::find($id);
        if ($ebook) {
            return response()->json([
                'status' => 200,
                'data' => $ebook

            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' .$id . 'tidak ditemukan'
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ebook = ebook::find($id);
        if($ebook){
            $ebook->tittle = $request->tittle ? $request->tittle : $ebook->tittle;
            $ebook->description = $request->description ? $request->description : $ebook->description;
            $ebook->author = $request->author ? $ebook->author : $request->author;
            $ebook->publisher= $request->publisher ? $ebook->publisher : $ebook->publisher;
            $ebook->date_of_issue = $request->date_of_issue ? $ebook->date_of_issue : $ebook->date_of_issue;

            $ebook->save();
            return response()->json([
                'status' => 200,
                'data' => $ebook
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ebook = ebook::where('id',$id)->first();
        if ($ebook) {
            $ebook->delete();
            return response()->json([
              'status' => 200,
              'data' => $ebook

            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'id' .$id . 'tidak ditemukan'
            ], 404);
        }
    }
}
