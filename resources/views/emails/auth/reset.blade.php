<x-mail::message>
# BloodBank Application

Reset Password.
<br>
<p>
Hello {{ $user->name }}
</p>
<br>

<p>Your reset code is : {{ $user->pin_code }}</p>


<x-mail::button :url="'http://bloodbank.com'">
Reset your password
</x-mail::button>




Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
