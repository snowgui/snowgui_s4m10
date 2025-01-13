@section("styles")
    <link rel="stylesheet" href="{!! asset('css/plugins/switchery/switchery.css') !!}" /> 
    <link rel="stylesheet" href="{!! asset('css/plugins/datapicker/datepicker3.css') !!}" />   
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

                <div class="col-12">
                    <div class="form-group">
                        <label class="font-bold">Read?</label>
                        <p><input type="checkbox" name="read" class="js-switch" {{isset($data->read) && $data->read == true ? 'checked' : ''}}/></p>
                        
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="read">Read</label>
                    <input name="read" id="read" type="text" class="form-control" value="{{@$data->read}}">
                </div> --}}


                <div class="form-group">
                    <label for="current_page">Current Page</label>
                    <input name="current_page" id="current_page" type="text" class="form-control" value="{{@$data->current_page}}">
                </div>
                
                <div class="form-group" id="data_1">
                    <label class="font-normal">Start Read</label>
                    <div class="input-group date">
                        @if(@$data->start_date_read != null)
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="start_date_read" id="start_date_read" value="{{\Carbon\Carbon::parse(@$data->start_date_read)->format('d/m/Y')}}">
                        @else
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="start_date_read" id="start_date_read" value="">
                        @endif
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="start_date_read">Start Read</label>
                    <input name="start_date_read" id="start_date_read" type="text" class="form-control" value="{{@$data->start_date_read}}">
                </div> --}}

                  
                <div class="form-group" id="data_2">
                    <label class="font-normal">End Read</label>
                    <div class="input-group date">
                        @if(@$data->end_date_read != null)
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="end_date_read" id="end_date_read" value="{{\Carbon\Carbon::parse(@$data->end_date_read)->format('d/m/Y')}}">
                        @else
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="end_date_read" id="end_date_read" value="">
                        @endif
                    </div>
                </div>
            
            </div>
        </div>

    </div>
</div>

@section('scripts')
    
    <script src="{{ asset('js/plugins/switchery/switchery.js')}}"></script>
    <script src="{!! asset('componentes/jquery-mask/jquery-mask.js') !!}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Book\BookRequest', '.form-validar') !!}
    
    <script>

        $(document).ready(function() {
            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1ab394' });
        });

        var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd/mm/yyyy'
            });

        var mem2 = $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: 'dd/mm/yyyy'
        });

        @if(session()->has('updated')) SwalAlert(null, "Sucesso", "Atualizado com sucesso!");  @endif

    </script>
@endsection