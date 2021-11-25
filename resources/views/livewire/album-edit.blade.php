<form action="/albums/{{$album->id}}/edit" method="post" enctype="multipart/form-data">
    <form>
        <fieldset>
            <legend> Editar Album</legend>
            <img src="/images/{{$album->cover_photo}}" alt="{{$album->title}}" height=300 width=300>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                    <input type="text" name="title" placeholder="Titulo" value="{{$album->title}}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="artist" class="col-sm-2 col-form-label">Artista</label>
                <div class="col-sm-10">
                    <input type="text" name="artist" placeholder="Artista" value="{{$album->artist->name}}"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Género</label>
                <div class="col-sm-10">
                    <input type="text" name="genre" placeholder="Género" value="{{$album->genre->name}}"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <laber for="price" class="col-sm-2 col-form-label">Preço (R$)</laber>
                <div class="col-sm-10">
                    <input type="text" name="price" placeholder="Preço" value="{{$album->price}}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" name="cover_photo" class="form-control">
                </div>
            </div>



            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Titulo</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderTracks as $index=>$orderTrack)
                        <tr>
                            <td>
                                <input type="hidden" name="orderTracks[{{$index}}][id]" value="{{$orderTrack['id']}}">
                                <input type="number" name="orderTracks[{{$index}}][number]" placeholder="Number"
                                    value="{{$orderTrack['number']}}" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="orderTracks[{{$index}}][title]" placeholder="Track Title"
                                    value="{{$orderTrack['title']}}" class="form-control">
                            </td>
                            <td>
                                <a class="btn btn-danger" href="#"
                                    wire:click.prevent="removeTrack({{$index}})">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-body">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addTrack">+ Adicionar
                            Faixa</button>
                    </div>
                </div>

                {{csrf_field()}}
                <button class="btn btn-primary" type="submit">Post</button>
            </div>
            <fieldset>
    </form>