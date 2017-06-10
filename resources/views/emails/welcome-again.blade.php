@component('mail::message')
# Introduction

Thanks so much registering!
<h1>Welcome to Laracasts, {{ $user->name }}</h1>
@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent
@component('mail::panel', ['url' => ''])
Some inspirational quote to go here. :)
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
