<?php


namespace App\Services\User\Admin\Librarian;


use App\Entities\Librarian;
use App\Services\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LibrarianService extends BaseService
{
    public function model()
    {
        return Librarian::class;
    }

    /**
     * @param $storeData
     */
    public function store($storeData) {
        $userData = Arr::only($storeData, ['first_name', 'last_name', 'email', 'role_id', 'password']);
        $userDetailData = Arr::only($storeData, ['phone','address']);
        $librarianData = Arr::only($storeData, ['salary']);

        DB::beginTransaction();
        $user = app(UserService::class)->store($userData, $userDetailData);
        $user->librarian()->create($librarianData);
        DB::commit();
    }

    /**
     * @param array|\Illuminate\Database\Eloquent\Model|int $updateData
     * @param $id
     * @return bool|int|void
     */
    public function update($updateData, $id)
    {
       $userData = Arr::only($updateData, ['first_name', 'last_name', 'email']);
        $userDetailData = Arr::only($updateData, ['phone','address']);
        $librarianData = Arr::only($updateData, ['salary']);


        DB::beginTransaction();
        $librarian = $this->findOrFail($id);
        app(UserService::class)->updateUser($userData, $userDetailData, $librarian->user_id);
        $librarian->update($librarianData);
        DB::commit();
    }

    public function destroy($id) {
        // $librarian = $this->findOrFail($id);

        // $user = $librarian->user;

        //  DB::beginTransaction();
        //  if($user->detail) {
        //      $user->detail()->delete();
        //  }
        //  if($librarian->detail) {
        //      $librarian->detail()->delete();
        //  }
        //  $librarian->delete();
        //  $user->delete();
        //  DB::commit();
    }
}
