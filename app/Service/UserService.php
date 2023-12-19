<?php


namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function list($request, $paginate)
    {

        # indexing numbers
        $i = (request()->input('page', 1) - 1) * $paginate;

        # users
        $data = new User();
        $data = $data->where('is_delete', 0);
        $count = $data->count();

        $data = $data->latest()->paginate($paginate);

        return [$data, $count, $i];
    }

    public function store($request)
    {
        try {

            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
                'status' => true,
                'cby' => auth()->user()->name
            ]);

            return ['success', 'Created Success'];
        } catch (\Exception $e) {
            return ['error', 'something went wrong'];
        }
    }

    public function update($request, $user)
    {
        try {
            $user->update([
                'name' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'role' => $request->role,
                'uby' => auth()->user()->name
            ]);

            return ['success', 'Updated Success'];
        } catch (\Exception $e) {
            return ['error', 'something went wrong'];
        }
    }

    public function delete($user)
    {
        try {
            $user->update([
                'is_delete' => true,
                'uby' => auth()->user()->name
            ]);

            return ['success', 'Delete Success'];
        } catch (\Exception $e) {
            return ['error', 'something went wrong'];
        }
    }

    public function updatePassword($request, $id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'password' => Hash::make($request->password),
                'uby' => auth()->user()->name
            ]);


            return ['success', 'Update Success'];
        } catch (\Exception $e) {
            dd($e->getMessage());
            return ['error', 'something went wrong'];
        }
    }
}
