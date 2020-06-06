@include('layouts.header')
<div class="container" style="background-color: white;">
    @foreach ($result as $r)
        <div class="buttons">
            <button onclick="window.history.back();" class="btn btn-danger"> Voltar</button>
            <h4 style="margin-top: 30px;">{{$r->title}}</h4>
            <p></p>
        </div>
        <div class="form-group">
            <div class='input-group'>
                <?= '<img src="'.$r->thumbnail->path.'.'.$r->thumbnail->extension.'" class="img"/>'; ?>
            </div>
            <p>{{$r->description}}</p>
        </div>
        @if($r->images)
        <div class='form-group' style="flex-wrap: wrap;">
            @foreach($r->images as $img)
                <?= '<a href="'.$img->path.'.'.$r->thumbnail->extension.'" target="_blank">
                        <img src="'.$img->path.'.'.$r->thumbnail->extension.'" class="img-sm"/>
                    </a>'; ?>
            @endforeach
        </div>
        @endif

    @endforeach
</div>