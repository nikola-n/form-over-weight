<?php

namespace App\Http\Livewire;

//use App\Mail\RegisterTrainer;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Register extends Component
{

    public $name;

    public $email;

    public $role;

    public $password;

    public $password_confirmation;

    public $successMessage;

    protected $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users|string',
        'role'     => 'required|not_in:0',
        'password' => 'required|min:8|string|confirmed',
    ];

    //real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contact = $this->validate();

        //$contact['name']    = $this->name;
        //$contact['email']   = $this->email;
        //$contact['phone']   = $this->phone;
        //$contact['message'] = $this->message;

        sleep(1);
        //Mail::to('nikola@nikola.com')->send(new  ContactFormMailable($contact));

        $this->successMessage = 'We received your message successfully and will get back to you shortly!';
        //session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.register');
    }
}
