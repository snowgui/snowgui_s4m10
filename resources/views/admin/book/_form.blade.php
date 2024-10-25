@section("styles")
    <link rel="stylesheet" href="{!! asset('css/plugins/switchery/switchery.css') !!}" />    
@endsection

<div class="row">
    <div class="col-8 offset-2">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" class="form-control" value="{{@$data->name}}">
                </div>

                <div class="form-group">
                    <label for="desc">Desc</label>
                    <input name="desc" id="desc" type="text" class="form-control" value="{{@$data->desc}}">
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input name="author" id="author" type="text" class="form-control" value="{{@$data->author}}">
                </div>

                <div class="form-group">
                    <label for="pages">Pages</label>
                    <input name="pages" id="pages" type="text" class="form-control" value="{{@$data->pages}}">
                </div>

                <div class="form-group">
                    <label for="read">Read</label>
                    <input name="read" id="read" type="text" class="form-control" value="{{@$data->read}}">
                </div>


                <div class="form-group">
                    <label for="current_page">Current Page</label>
                    <input name="current_page" id="current_page" type="text" class="form-control" value="{{@$data->current_page}}">
                </div>
                
            </div>
        </div>

    </div>
</div>

@section('scripts')
    
    <script src="{{ asset('js/plugins/switchery/switchery.js')}}"></script>
    <script src="{!! asset('componentes/jquery-mask/jquery-mask.js') !!}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Book\BookRequest', '.form-validar') !!}
    
    <script>

        $(document).ready(function() {
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1ab394' });
        });

        @if(session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif

    </script>
@endsection