<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    Class UserController extends Controller {
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    public function getUsers(){
        $users = app('db') -> select("SELECT * FROM tbluser");
        return response() -> json($users,200);
        //return $this->response($users, 200);
    }
}