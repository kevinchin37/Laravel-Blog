@component('mail::message')
# Blog Invitation

Here is your invite link!

@component('mail::button', ['url' => $inviteLink])
Join
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
