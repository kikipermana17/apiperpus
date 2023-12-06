<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function get()
    {
        $book = Book::all();
        return response()->json([
            'msg' => 'Data retrieved',
            'data' => $book,
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'terbit' => 'required|max:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Data Failed',
                'data' => $validator,
            ], 200);
        } else {
            $book = Book::create([
                'title' => $request->title,
                'terbit' => $request->terbit,
            ]);

            // Create
            if ($book) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Data created Successfull',
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'msg' => 'Data Failed Created',
                ], 500);
            }
        }

    }

    public function show($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json([
                'status' => 200,
                'data' => $book,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msg' => 'Data Not Found',
            ], 404);
        }
    }

    public function update($id, Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'terbit' => 'required|max:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Data Failed',
                'data' => $validator,
            ], 200);
        } else {

            $book = Book::find($id);
            // Create
            if ($book) {
                $book->update([
                    'title' => $request->title,
                    'terbit' => $request->terbit,
                ]);

                return response()->json([
                    'status' => 200,
                    'msg' => 'Data Updated Successfull',
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'msg' => 'Data Book Not Found',
                ], 404);
            }
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book) {
            $book->delete();
            return response()->json([
                'status' => 200,
                'msg' => 'Delete Successfull',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'msg' => 'Data Book Not Found',
            ], 404);
        }
    }
}
