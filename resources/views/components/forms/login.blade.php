<form action="{{ route('login.action') }}" method="POST">  
  @csrf
  <x-inputs.input type="text" id="email" label="Login" required="required" autofocus="autofocus" margin="mb-3" value="{{ old('email') }}"></x-inputs.input>
  <x-inputs.input type="password" id="password" label="Senha" required="required" margin="mb-5"></x-inputs.input>  
  <x-buttons.blue type="submit" label="Entrar" contentAlign="justify-center"></x-buttons.blue>
</form>