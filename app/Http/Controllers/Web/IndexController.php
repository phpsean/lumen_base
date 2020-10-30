<?php
/**
 * User: Sean
 * Date: 2020/10/29
 * Time: 13:45
 */

namespace App\Http\Controllers\Web;


use App\Bases\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class IndexController extends BaseController
{
    public function index()
    {
        Log::info(date('Y-m-d H:i:s'), ['type' => 'info']);
        Log::debug(date('Y-m-d H:i:s'), ['type' => 'debug']);
        Log::error(date('Y-m-d H:i:s'), ['type' => 'error']);

        $data1 = User::find(1);
        $data2 = User::onWriteConnection()->find(1);    // 强制读取写库
        $data3 = User::find(1);

        return $this->success([
            // 'insert' => User::create(['username' => 'test1', 'password' => 'password1', 'date' => date('Y-m-d H:i:s')]),
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'time'  => date('Y-m-d H:i:s')
        ]);
    }
}
