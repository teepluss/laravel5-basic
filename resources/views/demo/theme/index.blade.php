<h1>{{ Theme::getContentArgument('email') }}</h1>
<form method="post">
    <input type="text" pattern="[0-9]*" name="number" placeholder="Please enter only numeric" required/>
    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
    <input type="submit"/>
</form>
