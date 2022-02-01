<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\common\CommonFunc;
use Exception;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class UsersController extends Controller
{
    private $commonFunc;
    private $response;
    public $allUserData;

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
        try {

            $validateRes = $this->commonFunc->apiNullValidate($request->all());
            $validateAgeRes = $this->commonFunc->apiIntegerChecker($request->age);

            if ($validateRes == false) {
                $this->response['status'] = -1;
                $this->response['message'] = '全項目を入力してください。';

                return response()->json($this->response);
            }

            if ($validateAgeRes == false) {
                $this->response['status'] = -1;
                $this->response['message'] = '年齢を数字で入力してください';

                return response()->json($this->response);
            }

            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($request->password);

            if ($user->save() == false) {
                $this->response['status'] = -1;
                $this->response['message'] = '予期せぬエラーが発生しました。';

                return response()->json($this->response);
            }

            return response()->json($this->response);
        } catch (Exception $exception) {

            Log::error($exception);
            $this->response['status'] = -1;
            $this->response['message'] = '予期せぬエラーが発生しました。';

            return response()->json($this->response);
        }
    }

    public function userList(): JsonResponse
    {
        $users = User::all();
        $result = [];

        foreach ($users as $user) {
            $result [] = [
                'id' => $user->id,
                'user_name' => $user->user_name,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'gender' => $user->gender,
                'age' => $user->age,
                'user_type' => $user->user_type,
            ];
        }

        $this->response['result'] = $result;

        return response()->json($this->response);
    }

    public function userEdit($id): JsonResponse
    {
        $user = User::find($id);

        if ($user == false) {
            $this->response['status'] = -1;
            $this->response['message'] = 'ユーザーが見つかりません';

            return response()->json($this->response);
        }

        $result = [
            'id' => $user->id,
            'user_name' => $user->user_name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'gender' => $user->gender,
            'age' => $user->age,
            'user_type' => $user->user_type,
        ];

        $this->response['result'] = $result;

        return response()->json($this->response);
    }
}
