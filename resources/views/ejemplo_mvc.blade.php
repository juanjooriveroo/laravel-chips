<div>
    <h1>{{$nombre_titulo}}</h1>
    <ul>
        @foreach ($datos_modelo as $dato)
            <li>{{$dato['usuario']}} ha escrito {{$dato['meme']}}</li>
        @endforeach
    </ul>
</div>
