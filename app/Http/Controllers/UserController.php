<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    // User Registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create the user
        $user = $this->create($request->all());
    
        // Fire the Registered event (if needed, based on your app's needs)
        event(new Registered($user));
    
        // Do NOT log the user in automatically
        // Comment out the next line to avoid auto-login
        // $this->guard()->login($user);  // Remove or comment this line
    
        // Return a successful registration message and redirect to the login page
        return $this->registered($request, $user);
    }
    
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    protected function guard()
    {
        return Auth::guard();
    }
    
    protected function registered(Request $request, $user)
    {
        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    

    // User Login
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        // Return with an error if authentication fails
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // User Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Update home method
    public function home()
    {
        $user = auth()->user();

        $defaultModelUserAttributes = [
            'is_admin', 'first_name', 'last_name', 'email', 'password',
        ];

        return view('home', compact('user', 'defaultModelUserAttributes'));
    }

    public function showAchievements()
    {
        $foodSaved = 1200; 
        $totalOrders = 1500;
        $usersHelping = 450;

        return view('achievements', compact('foodSaved', 'totalOrders', 'usersHelping'));
    }

    public function showCart()
    {
        return view('cart');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        
        $id = $request->input('id');
        $quantity = $request->input('quantity');
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


public function showOrder()
{
    return view('order');
}


    // Thank You page 
    public function thankYou()
    {
        return view('thank-you');
    }

    public function showProfile()
    {
        return view('profile');
    }

      public function profile()
      {
          return view('profile'); 
      }
  
      public function updateAvatar(Request $request)
      {
          // Validate the uploaded image
          $request->validate([
              'avatar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
          ]);
      
          $user = Auth::user();
      
          // Read the uploaded file and convert it to Base64
          $image = $request->file('avatar');
          $imageData = base64_encode(file_get_contents($image->getRealPath()));
      
          // Construct the Base64 data string (e.g., "data:image/jpeg;base64,...")
          $imageMimeType = $image->getMimeType();
          $base64Image = "data:$imageMimeType;base64,$imageData";
      
          // Save the Base64 string to the user's avatar field
          $user->avatar = $base64Image;
          $user->save();
      
          return redirect()->route('profile')->with('success', 'Avatar updated successfully!');
      }
      



    
}
