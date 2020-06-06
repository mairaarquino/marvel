@include('layouts.header')
    <h2 style="text-align: center;padding:60px;"> Lista de Personagens </h2>
    <div class="show">
        @foreach ($result as $r)
            <div class='input-group'>
                    <h4>{{$r->name}}</h4>
                    <?= '<img src="'.$r->thumbnail->path.'.'.$r->thumbnail->extension.'" class="img"/><br/>'; ?>
                    <a href="{{ route('character', $r->id)}}" class="btn btn-primary btn-sm">Ver mais</a>
            </div>
        @endforeach  
    </div>
</body>
</html>