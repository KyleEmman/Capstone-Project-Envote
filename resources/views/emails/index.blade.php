<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Envote Receipt</title>
</head>
<body>
    @php
    $candidates = $data['candidates'];
    @endphp
    <h3>{{$data['election']->title}}</h3>
    <p>Congrats {{auth()->user()->firstName . " " . auth()->user()->lastName}}!</p><br>
    <p>You have successfully voted for {{$data['election']->title}}!</p>
    {{-- <p>Hello, we are sending you this email because you just voted for {{$data['election']->title}},</p> --}}
    {{-- <p>to summarize, these are your selected candidates:<br></p>
    @foreach($data['election']->positions()->get() as $position)
        @php
            $firstName = $candidates->where('id', $data['positions'][$position->id])->first()->firstName ?? "No Candidate Voted";
            $lastName = $candidates->where('id', $data['positions'][$position->id])->first()->lastName ?? '';
            $party = $candidates->where('id', $data['positions'][$position->id])->first()->party ?? '';
        @endphp

        {{$position->title}} : {{$firstName}} {{$lastName}} {{$party == '' ? '' : '('.$party.')'}} <br>
    @endforeach --}}
</body>
</html>