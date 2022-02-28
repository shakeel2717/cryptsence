<?php
$refers = DB::table('users')
    ->where('refer', $user->username)
    ->get();
?>
@foreach ($refers as $refer)
    <li>
        <a href="{{ route('user.team.index',['id' => $refer->id]) }}"><img class="img-avatar" src="{{ asset('assets/media/avatars/avatar10.jpg') }}"
                alt="User Avatar">
            <br>
            {{ $refer->name }}</a>
        <ul>
            <x-tree :user="$refer" />
        </ul>
    </li>
@endforeach