<?php

namespace App\Http\Controllers;

use App\Models\Wordpress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $wordpres = Wordpress::all();
        return view('index', ['wordpress' => $wordpres]);
    }

    public function downloadFile($file)
    {
        return Storage::download($file);
    }

    public function search(Request $request)
    {
        // Lấy giá trị tìm kiếm từ yêu cầu Ajax
        $searchValue = strtolower($request->input('search'));

        // Thực hiện truy vấn tìm kiếm trong cơ sở dữ liệu
        $wordpress = Wordpress::where('name', 'LIKE', "%{$searchValue}%")->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($wordpress);
    }

    // event home


}
