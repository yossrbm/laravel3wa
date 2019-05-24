<form action="{{route('handleStudentLogin')}}" method="post">
    {{csrf_field()}}
    <div>
        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div>
        <label for="psw">mot de passe :</label>
        <input type="password" id="psw" name="pssword">
    </div>
    <button type="submit">Login</button>
   
    
</form>