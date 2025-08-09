<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aiController extends Controller
{
     public function hotelLinks()
    {
        return response()->json([
            [
                'title' => 'HXH Royal',
                'price' => '690.000đ / đêm',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQjHZUfs4fOM83j681LzHZeGvyp6DyLrbOPana164-uruC8SBvwKG6ivxtWf8BvCOZ6q4&usqp=CAU',
                'url' => 'http://127.0.0.1:5173/room-types/1'
            ],
            [
                'title' => 'HXH Royal 1',
                'price' => '690.000đ / đêm',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQRkhre2vWNe8iIEMTJaun6rm2eIuPXJBUBvNxNgAXXAUHOZtxn9Q5BAKdz3nXn5eck6E&usqp=CAU',
                'url' => 'http://127.0.0.1:5173/room-types/2'
            ],
            [
                'title' => 'HXH VIP Suite',
                'price' => '1.380.000đ / đêm',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQjHZUfs4fOM83j681LzHZeGvyp6DyLrbOPana164-uruC8SBvwKG6ivxtWf8BvCOZ6q4&usqp=CAU',
                'url' => 'http://127.0.0.1:5173/room-types/3'
            ],
            [
                'title' => 'HXH Executive Suite',
                'price' => '1.380.000đ / đêm',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQRkhre2vWNe8iIEMTJaun6rm2eIuPXJBUBvNxNgAXXAUHOZtxn9Q5BAKdz3nXn5eck6E&usqp=CAU',
                'url' => 'http://127.0.0.1:5173/room-types/4'
            ],
            [
                'title' => 'HXH Deluxe Twin',
                'price' => '1.380.000đ / đêm',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQjHZUfs4fOM83j681LzHZeGvyp6DyLrbOPana164-uruC8SBvwKG6ivxtWf8BvCOZ6q4&usqp=CAU',
                'url' => 'http://127.0.0.1:5173/room-types/5'
            ],
            [
                'title' => 'HXH Deluxe Triple',
                'price' => '5.100.000đ / đêm',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQRkhre2vWNe8iIEMTJaun6rm2eIuPXJBUBvNxNgAXXAUHOZtxn9Q5BAKdz3nXn5eck6E&usqp=CAU',
                'url' => 'http://127.0.0.1:5173/room-types/6'
            ],
            [
                'title' => 'Liên hệ đặt phòng',
                'price' => 'HXH Hotel',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0TFUElCZcHO51kWoiNKkotqlI6TMA6vLjMw&s',
                'url' => 'http://127.0.0.1:5173/booking_hotel'
            ],
            [
                'title' => 'Liên hệ hủy đặt phòng',
                'price' => 'HXH Hotel',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFa_DpqDZQ4Tc2rGrx9RhEW8ApuNnp-JAqrA&s',
                'url' => 'http://127.0.0.1:5173/HistoryBooking'
            ],
            [
                'title' => 'Nhân viên hỗ trợ ',
                'price' => 'HXH Hotel',
                'image' => 'https://www.hoteljob.vn/files/TRUNG/anh%20thang%207/bi-quyet-de-tro-thanh-nhan-vien-khach-san-chuyen-nghiep-02.jpg',
                'url' => 'https://chat.zalo.me'
            ]
        ]);
    }
}
