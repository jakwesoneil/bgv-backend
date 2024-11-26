<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

use App\Models\User;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthService
{
    public function authenticate($credentials)
    {
        if (Auth::attempt($credentials))
        {
            $user = Auth::user();

            /**
             * @var \App\Models\User::class $user
             */
            $token = $user->createToken(
                time(), [$user->role], now()->addHours(24)
            )->plainTextToken;

            return [
                'user' => $user,
                'token' => $token
            ];
        }

        throw new UnauthorizedHttpException('Bearer', 'Invalid credentials provided');
    }

    public function createAccount($data)
    {
        $user = User::query()->where('email', $data['email'])->first();

        if ($user)
        {
            throw new BadRequestException('E-mail used already');
        }

        $createUser = User::query()->create([
            'account_no'    => strtoupper(Str::random(15)),
            'account_type'  => $data['account_type'],
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password'])
        ]);

        return $createUser;
    }
}
