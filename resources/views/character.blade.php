@include('layouts.header')
<div class="jumbotron">
    <button class="btn btn-danger">Voltar</button>
    <div class="show">
                @foreach ($result as $r)
                    <div class='input-group'>
                        {{$r->name}}<br/>
                        <?= '<img src="'.$r->thumbnail->path.'.'.$r->thumbnail->extension.'" class="img"/><br/>'; ?>
    
                        {{$r->description}}<br/>
                    </div>
                    {{-- foreach($r->comics->items as $comic) {
                        echo '<form action'
                        echo $comic->name.'<br/>';
                    } --}}
                @endforeach  
        </div>
</div>
</body>
</html>