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
            {{ $refer->username }} <br>
            $ {{ number_format(myPlanCount($refer->id),2) }} <br>
            <p class="text-primary mb-0">{{ ($refer->network == 1) ? "Member" : "Normal Account" }}</p>


        </a>
        <ul>
            <x-tree :user="$refer" />
        </ul>
    </li>
@endforeach
