<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Wordpress as Wordpresss;
use Illuminate\Http\Request;


class Wordpress extends Controller
{
    public function index()
    {
        $wordpres = Wordpresss::where('status', 1)->get();
        return view('pages.wordpress', ['wordpress' => $wordpres]);
    }

    public function downloadFile($file_name)
    {
        $file_path = public_path('storage/' . $file_name);
        return response()->download($file_path);

    }

    public function search(Request $request)
    {
        // Lấy giá trị tìm kiếm từ yêu cầu Ajax
        $searchValue = strtolower($request->input('search'));

        // Thực hiện truy vấn tìm kiếm trong cơ sở dữ liệu
        $wordpress = Wordpresss::where('name', 'LIKE', "%{$searchValue}%")->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($wordpress);
    }
}
