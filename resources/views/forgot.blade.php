<h1> Hello {{$user->name}} </h1>

<p>
    please click button
    <a href="{{url('test/'.$user->email.'/'.$code)}}">click</a>
</p>
