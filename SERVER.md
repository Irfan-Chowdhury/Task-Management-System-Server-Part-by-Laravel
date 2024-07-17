<div align='center'>

<h1>Task Management System (Server) </h1>
</div>


## Form Request
#### StoreMemberRequest : 

```bash
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'employee_id' => 'required|string|unique:users,employee_id,NULL,id,deleted_at,NULL',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:5|confirmed',
        ];
    }

    // This is For API
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(self::rules()),
        ], 422));
    }
}
```


#### UpdateMemberRequest : 

```bash

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $data = [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email||unique:users,email,'.$this->user_id.',id,deleted_at,NULL',
            'employee_id' => 'required|string|unique:users,employee_id,'.$this->user_id.',id,deleted_at,NULL',
            'position' => 'required|string|max:255',
            'password' => 'nullable|string|min:5|confirmed',
        ];

        if (isset($this->password)) {
            $data['password'] = 'string|min:5|confirmed';
        }

        return $data;

    }

    // This is For API
    protected function failedValidation(Validator $validator)  
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(self::rules()),
        ], 422));
    }
}

```


## POSTMAN
- Fetch All Data: To display team-members data using POSTMAN
<img src="https://snipboard.io/ECLN9n.jpg">


- Store Data (1): Display Validation error in POSTMAN. But before, 
Just add `accept` : `application/json` into your headers in postman or whatever you are using for API testing purposes.
<img src="https://snipboard.io/XeQnUj.jpg">

- Store Data (2): Use key-value in `x-www.form-urlencoded` and input data in the form in POSTMAN. 
<img src="https://snipboard.io/qEmlM1.jpg">


- Update Data (1): Display Validation error in POSTMAN.
<img src="https://snipboard.io/EYt8cB.jpg">


- Update Data (2): But before, just add `accept` : `application/json` into your headers in postman or whatever you are using for API testing purposes. Use key-value in `x-www.form-urlencoded` and input data in the form in POSTMAN. 
<img src="https://snipboard.io/0w6rhE.jpg">


- Delete Data : 
<img src="https://snipboard.io/Xi4SQZ.jpg">


## Sanctum API Auth
```bash
class BaseController extends Controller
{
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'result'  => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
```

```bash
    public function register(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => '123',
            'position' => 'admin',
            'role_id' => 1,
            'password' => bcrypt($request->password),
        ]);
        $success['token'] =  $user->createToken('TMS')->plainTextToken;
        $success['name']  =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }
```

- Registration: But before, just add `accept` : `application/json` into your headers in postman or whatever you are using for API testing purposes. Use key-value in `x-www.form-urlencoded` and input data in the form in POSTMAN. 
<img src="https://snipboard.io/G18URP.jpg">
<img src="https://snipboard.io/xmj3dy.jpg">
<img src="https://snipboard.io/JeVw4D.jpg">


- Login : But before, just add `accept` : `application/json` into your headers in postman or whatever you are using for API testing purposes.

```bash
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $data['token']  =  $user->createToken('TMS')->plainTextToken;
            $data['userId'] =  $user->id;
            $data['name']   =  $user->name;
            $data['email']  =  $user->email;

            return $this->sendResponse($data, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
```
<img src="https://snipboard.io/dm3Iog.jpg">


- Logout : But before, just add `accept` : `application/json` into your headers in postman or whatever you are using for API testing purposes. And you have to setup token before action.
```bash
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return $this->sendResponse([], 'Logout Successfully');
    }
```
<img src="https://snipboard.io/tkU5cz.jpg">

