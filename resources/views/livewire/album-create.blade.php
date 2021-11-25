<form action="/criaAlbum" method="post" enctype="multipart/form-data">
    <form>
        <fieldset>
            <legend>Criar Novo Album</legend>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                    <input type="text" name="title" placeholder="Titulo" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="artist" class="col-sm-2 col-form-label">Artista</label>
                <div class="col-sm-10">
                    <input type="text" name="artist" placeholder="Artista" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Gênero</label>
                <div class="col-sm-10">
                    <input type="text" name="genre" placeholder="Genero" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Preço</label>
                <div class="col-sm-10">
                    <input type="number" name="price" min="0" value="0" step="0.01" placeholder="Preço"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="cover_photo" class="col-sm-2 col-form-label">Capa</label>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderTracks as $index=>$orderTrack)
                        <tr>
                            <td>
                                <input type="number" name="orderTracks[{{$index}}][number]" placeholder="Numero"
                                    value="{{$index+1}}" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="orderTracks[{{$index}}][title]" placeholder="Titulo da Faixa"
                                    class="form-control">
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
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addTrack">Adicionar outra
                            faixa</button>
                    </div>
                </div>

                {{csrf_field()}}
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </fieldset>
    </form>