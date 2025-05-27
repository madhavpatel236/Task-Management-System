<form action="{{ route('loginAuth') }}" method="POST">
    @csrf
    <h2> Login </h2>
    <label> Email: </label>
    <input name="email" id="email" class="email" />
    <span id="email_error"> </span> <br /> <br />

    <label> Password: </label>
    <input name="password" id="password" class="password" />
    <span id="password_error"> </span> <br /> <br />

    <button> Submit </button>
</form>
