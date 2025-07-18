<?php

namespace App\Http\Requests\Auth;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $user = User::where('email',$this->login)
                ->orWhere('username',$this->login)
                ->orWhere('contactnumber',$this->login)
                ->first();

        // if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            if(!$user || !Hash::check($this->password,$user->password)){
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login' => trans('auth.failed'),
            ]);
        }
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i:s');
        $result = Attendance::where('date', $currentDate)->where('employee_id', $user->id)->first();
        if(!$result){
            Attendance::insert([
                'employee_id' => $user->id,
                'date' => $currentDate,
                'in_time' => $currentTime,
                'created_at' => now(),
                'login_lgn'=> $this->longitude,
                'login_lat'=> $this->latitude,
                'login_accuracy'=>$this->accuracy,
            ]);
        }
        Auth::login($user,$this->boolean('remember'));
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
