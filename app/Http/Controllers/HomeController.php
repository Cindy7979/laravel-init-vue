<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (!Auth::check()) 
            return redirect()->route('login'); // 로그인이 끊긴 경우 다시 로그인 페이지로 이동 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout.login');
    }

    public function doLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // 입력값 유효성 검사
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => '아이디를 입력해 주세요.',
            'email.email' => '이메일 형식을 확인해 주세요.',
            'password.required' => '패스워드를 입력해 주세요.',
        ]);

        if ($validator->fails()) { // 유효성 체크 
            return $validator->errors()->add('status', '422'); // 422 :: 처리할 수 없는 엔티티 
        }

        // \Auth::check(); -> 확인만 해줌 
        if (! Auth::attempt($credentials)) { // -> 인증을 시도 후 맞으면 세션 정보를 만들어줌 
            return [ 'code' => '401', 'msg'  => '로그인정보를 확인해 주세요.' ];
        }

        // 로그인 성공시.. 
        return [ 'code' => '200', 'redirect' => route('mypage') ];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Show my page after login.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMyPage() {
        $data = [
            'user' => Auth::user(),
        ];

        return view('layout.mypage', $data);
    }
}
