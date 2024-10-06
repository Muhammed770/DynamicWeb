<x-layout>
    <form action="/login" method="POST">
        @csrf
        <div class="flex flex-col space-y-8 bg-white  dark:bg-slate rounded-lg  px-8 py-4 ">
            <h1 class="text-3xl font-bold text-center tracking-tighter">Login</h1>
            <x-form-input type="email" id="email" name="email" :value="old('email')" placeholder="email" required/>
            <x-form-input type="password" id="password" name="password" placeholder="password" required/>
            <x-form-button-primary>Login</x-form-button-primary>
            <h1 class="text-center text-sm">Don't have an account? <a href="/register" class="text-sand">Register</a></h1>
        </div>
    </form>
</x-layout>