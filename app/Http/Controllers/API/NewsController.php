<?php

namespace App\Http\Controllers\API;

use App\News;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Resources\NewsList;
use App\Http\Resources\NewsDetail;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function news(Request $request)
    {
        $data = News::query()->with([
            'user'
        ])->orderBy('created_at', 'DESC')->paginate(10);
        if (isset($data)) {
            $data = NewsList::collection($data)->additional(['result' => true, 'message' => 'Success']);
            return $data;
        }
        return ResponseHelper::fail('Fail', null);
    }
    public function news_detail(Request $request, $id)
    {
        $data = News::with([
            'user'
        ])
            ->where('id', $id)
            ->first();
        if (isset($data)) {
            $data->view_count = $data->view_count + 1;
            $data->update();
            $data = new NewsDetail($data);
            return ResponseHelper::success('Success', $data);
        }
        return ResponseHelper::fail('Fail', null);
    }
}
