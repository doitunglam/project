<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Resources\Product as ProductResource;

class AuthController extends BaseController
{
    // Return login page
    public function view()
    {
        return view('login');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $response = new \stdClass;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'Quyen' => 10])) {
            $user = Auth::user();

            $response->message = "Đăng nhập thành công";
            $response->status = 1;
            $response->request = $request;
            // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            // $success['name'] =  $user->name;

            $request->session()->regenerate();

        } else {
            $response->message = "Đăng nhập thất bại, vui lòng kiểm tra thông tin";
            $response->status = 0;
        }
        return $this->sendResponse($response, "Submit OK");
    }

    // Do logout action
    public function remove()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }

}
