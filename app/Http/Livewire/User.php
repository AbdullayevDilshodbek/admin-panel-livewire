<?php

namespace App\Http\Livewire;

use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use App\Models\User as ModelsUser;
use App\Repositories\UserRepository;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    protected $users;
    public ModelsUser $user;

    // public string $id;
    public $uid;
    public $fullName;
    public $username;
    public $password;

    public bool $isAdd = true;
    public bool $isOpenDialog = false;

    public string $search = '';
    protected $queryString = ['search'];

    public string $notification_ = 'hidden';
    // protected UserInterface $userRepository;

    // public function mount(UserInterface $userRepository)
    // {
    //     $this->userRepository = $userRepository;
    //     $this->getUsers();
    // }

    public function mount()
    {
        $this->getUsers();
    }

    public function render()
    {
        $this->getUsers();
        return view('livewire.user', ['users' => $this->users]);
    }

    public function getUsers()
    {
        $this->users = ModelsUser::where(function($query){
            $query->where('full_name', 'like', "%{$this->search}%");
        })
            ->orderByDesc('id')
            ->paginate(10);
        // $this->users = UserRepository::getWithPagination($search);
        // $this->users = UserResource::collection($this->userRepository->getWithPagination($search));
    }

    public function dialog(ModelsUser $user = null)
    {
        if($user){
            $this->uid = $user->id;
            $this->fullName = $user->full_name;
            $this->username = $user->username;
        }
        $this->isAdd = $this->uid > 0 ? false : true;
        $this->isOpenDialog = !$this->isOpenDialog;
    }

    public function add()
    {
        ModelsUser::create([
            'full_name' => $this->fullName,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'active' => true
        ]);
        $this->isOpenDialog = !$this->isOpenDialog;
    }

    public function edit()
    {
        $user = ModelsUser::find($this->uid);
        $user->update([
                'full_name' => $this->fullName,
                'username' => $this->username,
                'password' => $this->password ? bcrypt($this->password) : $user->password
        ]);
        $this->isOpenDialog = !$this->isOpenDialog;

    }

    public function changeActive(int $id)
    {  
        $user = ModelsUser::find($id);
        $user->active = !$user->active;
        $user->save();

        $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => 'User Created Successfully!']);
    }

    public function message()
    // public function message(string $text, $status)
    {
        // switch($status){
        //     case 200 || 201 :
        //         return 'Amalyot bjarildi';
        //     case 400:
        //         return 'Error';
        // }
        // $this->notification_ = '';
        // sleep(4);
        // $this->notification_ = 'hidden';
        session()->flash('message', 'Post successfully updated.');
        session()->remove('message');
    }
}
