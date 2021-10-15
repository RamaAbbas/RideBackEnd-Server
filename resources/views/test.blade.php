<form action="test" method="POST">
    @csrf
    <input type="text" name="firstname" placeholder="enter firstname"> <br> <br>
    <input type="text" name="lastname" placeholder="enter lastname"> <br> <br>
    <input type="text" name="address" placeholder="enter address"> <br> <br>
    <input type="text" name="number" placeholder="enter number"> <br> <br>
    <button type="submit"> ADD USER </button>
</form>