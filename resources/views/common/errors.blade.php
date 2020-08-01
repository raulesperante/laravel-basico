@if(count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
    <strong>Whoops! Something went wrong!</strong>
    <br><br>
</div>
<ul>
    @foreach ($errors->all() as $error)
     <li>{{$error}}</li>
    @endforeach
</ul>
@endif