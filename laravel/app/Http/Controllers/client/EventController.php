<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index()
    {
        $event = Event::where('status', 1)->get();
        return view('pages.event', ['events' => $event]);
    }

    public function register(Request $request)
    {
        try {
            // Kiểm tra đăng nhập
            if (!Auth::check()) {
                return redirect()->route('login');
            }

            // // Xác thực dữ liệu
            // $this->validate($request, [
            //     'event_id' => 'required|integer|exists:events,id',
            //     // ... Dữ liệu khác nếu cần
            // ]);

            // Lưu thông tin đăng ký
            $event = Event::find($request->event_id);
            // Lấy thông tin người dùng hiện tại
            $user = Auth::user();

            dump($user);
            // Thêm thông tin người dùng vào dữ liệu lưu
            $data = [
                'event_id' => $request->event_id,
                // 'role' => $request->role ?? $event->default_role,
                'user_id' => $user->id,
            ];
            // dump(array($date));
            // Lưu thông tin đăng ký
            $dk = EventUser::create($data);
            dump($dk);
            // Phản hồi thành công
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký sự kiện thành công!',
            ]);
        } catch (Exception $e) {
            // Xử lý lỗi và trả về phản hồi lỗi
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đăng ký sự kiện.',
            ]);
        }
    }

    public function search(Request $request)
    {
        // Lấy giá trị tìm kiếm từ yêu cầu Ajax
        $searchValue = strtolower($request->input('search'));

        // Thực hiện truy vấn tìm kiếm trong cơ sở dữ liệu
        $event = Event::where('name', 'event_type_id', "%{$searchValue}%")->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($event);
    }

}

