<h2 class="title">Welcome User to Dashboard</h2>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Logout</button>
</form>
