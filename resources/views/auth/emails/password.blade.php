Usuario {{$user->nombre}}:
<br>
Utilize este link para reiniciar tu password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
