<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commercial;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommercialsAuthenticateController extends Controller
{
     // Register
    public function register(Request $request)
	{
		try
		{
            \Config::set('auth.providers.users.model', \App\Commercial::class);
			//var_dump($request);
			//var_dump($request->input());
			$commercial = New Commercial;
        	$commercial->commercial_name = $request->input('commercial_name');
        	$commercial->commercial_email = $request->input('commercial_email');
        	$commercial->commercial_password = bcrypt($request->input('commercial_password'));
        	$commercial->commercial_telephone = $request->input('commercial_telephone');
        	$commercial->commercial_address = $request->input('commercial_address');
        	$commercial->commercial_start_operation_hour = $request->input('commercial_start_operation_hour');
        	$commercial->commercial_end_operation_hour = $request->input('commercial_end_operation_hour');
        	//var_dump($commercial);
        	$commercial->save();
		}
		catch(JWTException $e)
		{
			return response()->json(['error' =>'Commercial Already exists'],404);
		}
		$token = JWTAuth::fromUser($commercial);
   		return response()->json(compact('token'));
	}
    
    
	public function login(Request $request)
	{	
		
       $credentials = $request->only('commercial_email', 'commercial_password');
	   try {
            \Config::set('auth.providers.users.model', \App\Commercial::class);
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' =>'Commercial Not Found'],401);
            }

        } catch (JWTException $e) {
            // something went wrong

            return response()->json(['error' => 'TEST'], 500);
        }
         return response()->json(compact('token'));
	} 
}
