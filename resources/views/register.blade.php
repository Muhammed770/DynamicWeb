<x-layout>
    <form action="/register" method="POST">
        @csrf
        <div class="flex flex-col space-y-8 bg-white  rounded-lg  px-8 py-4">
            <h1 class="text-3xl font-bold text-center tracking-tighter">Register</h1>
            <div class="flex space-x-4">
                <x-form-input type="text" id="first_name" name="first_name" placeholder="first name" required :value="old('first_name')"/>
                <x-form-input type="text" id="last_name" name="last_name" placeholder="last name" required :value="old('last_name')"/>
            </div>
            <x-form-input type="text" id="username" name="username" required :value="old('username')" placeholder="username"/>
            <x-form-input type="email" id="email" name="email" required :value="old('email')" placeholder="email"/>
            <x-form-input type="password" id="password" name="password" placeholder="password" />
            <x-form-input type="password" id="password_confirmation" name="password_confirmation" placeholder="confirm password" required/>
            <x-form-button-primary>Register</x-form-button-primary>
            <h1 class="text-center text-sm">Already have an account? <a href="/login" class="text-sand">Login</a>
            </h1>
        </div>
    </form>
</x-layout>