<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\common\CommonFunc;
use Exception;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    private $commonFunc;
    private $response;

    public function __construct()
    {
        $this->commonFunc = new CommonFunc();
        $this->response = [
            'status' => 0,
            'message' => '',
            'result' => [],
        ];
    }

    public function makeUser(Request $request): JsonResponse
    {
        try{

            $validateRes = $this->commonFunc->apiNullValidate($request->all());
            $validateAgeRes = $this->commonFunc->apiIntegerChecker($request->age);

            if($validateRes == false){
                $this->response['status'] = -1;
                $this->response['message'] = '全項目を入力してください。';

                return response()->json($this->response);
            }

            if($validateAgeRes == false){
                $this->response['status'] = -1;
                $this->response['message'] = '年齢を数字で入力してください';

                return response()->json($this->response);
            }

            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            
            if ($user->save() == false){
                $this->response['status'] = -1;
                $this->response['message'] = '予期せぬエラーが発生しました。';

                return response()->json($this->response);
            }

            return response()->json($this->response);
        }catch (Exception $exception){

            Log::error($exception);
            $this->response['status'] = -1;
            $this->response['message'] = '予期せぬエラーが発生しました。';

            return response()->json($this->response);
        }
    }
}
