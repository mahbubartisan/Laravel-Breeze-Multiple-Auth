<?php
   
namespace App\Http\Controllers\Auth;
   
use Exception;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

   
class GoogleSocialiteController extends Controller
{
 
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
      
            $finduser = Employee::where('social_id', $user->getId())->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect()->route('employee.dashboard');
      
            }else{
                $newUser = Employee::create([
                    'firstname' => $user->getName(),
                    'email' => $user->getEmail(),
                    'social_id'=> $user->getId(),
                    'social_type'=> 'google',
                    'password' => bcrypt('my-google')
                ]);
     
                Auth::login($newUser);
      
                return redirect()->route('employee.dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}