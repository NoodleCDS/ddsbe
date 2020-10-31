<?php
namespace App\Http\Controllers;
use App\Models\User; //This is where the change in User.php makes sense. TLDR updates Models
use Illuminate\Http\Response; //Returns in ApiResponser.php
use App\Traits\ApiResponser; //For the standardized responses
use Illuminate\Http\Request; //Handling HTTP request in lumen
use DB;
Class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    //For Login v
    public function showlogin(){
        return view('login');//Show login.php
    }

    public function result(){
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $login = app('db')->select("SELECT * FROM tbluser WHERE username='$username' and password ='$password'");
        //^Reads details from request
        
        if(empty($login)){
            return $this->errorResponse('Invalid login!',Response::HTTP_NOT_FOUND);
        }else{
            echo '<script>alert("Login succesful!")</script>';//POP-OUT script
            return view('login');//Back to login page. 
        }

    }
    //For Login ^

    public function getUsers(){//When ELOQUENT is not being used
        $users = DB::connection('mysql')
        ->select("Select * from tbluser");
        return $this->successResponse($users);
        //return response()->json($users, 200);
    }
    
    public function index(){//ELOQUENT is used. Basically means that DB is not being used.
        $users = User::all();
        return $this->successResponse($users);
    }

    public function addUser(Request $request ){//C for CREATE!
        $rules = [
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ];

        $this->validate($request,$rules);
        $user = User::create($request->all());//This will ask for data.
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function show($id){//R for READ!
        $user = User::where('ID', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User not found or does not exist.', Response::HTTP_NOT_FOUND);
        }
        /*$user = User::findOrFail($id); //ELOQUENT VERSION
         return $this->successResponse($user);
         */
    }

    public function update(Request $request,$id){//U for Update!
        $rules = [
        'username' => 'max:255',//Notice how it's not "required|max:255."
        'password' => 'max:255'// This is for PATCHING so we can use it.
        ];

        $this->validate($request, $rules);
            
        $user = User::where('id' ,$id)->first();
        if($user){
            $user->fill($request->all());
            
            if ($user->isClean()) {
                //No changes had been made.
                return $this->errorResponse('Change at least one(1) element.', Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $user->save();
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
        
    }

    public function delete($id){//D for delet.
        $user = User::findOrFail($id);
        $user->delete();
        return $this->successResponse($user);
    }

}