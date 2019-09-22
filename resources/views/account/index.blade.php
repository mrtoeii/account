@extends('dashboard.dashboard_layouts')

@section('title', 'Account')


@section('content')

    <script type="text/javascript">
        $(document).ready(function(e){
            $('#account_form').on('submit',function(e){
                var formdata = new FormData(this);
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{url("account.insert")}}' ,
                    type: "POST",
                    data: formdata,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if (data.errors) {
                            $("#text-type").find("ul").html('');
                            $("#text-type").css('display','block');

                            $("#text-list").find("ul").html('');
                            $("#text-list").css('display','block');

                            $("#text-amount").find("ul").html('');
                            $("#text-amount").css('display','block');

                            $("#text-description").find("ul").html('');
                            $("#text-description").css('display','block');
                            $.each(data.errors, function( key, value ) {
                                console.log(key);
                                if (key=='type') {
                                    $("#text-type").find("ul").append('<li>'+value+'</li>');
                                }
                                if (key=='list') {
                                    $("#text-list").find("ul").append('<li>'+value+'</li>');
                                }
                                if (key=='amount') {
                                    $("#text-amount").find("ul").append('<li>'+value+'</li>');
                                }
                                if (key=='description') {
                                    $("#text-description").find("ul").append('<li>'+value+'</li>');
                                }

                            });
                        }else if (data.success==200){
                            $("#text-type").html('');
                            $("#text-list").html('');
                            $("#text-amount").html('');
                            $("#text-description").html('');
                            console.log('inserted');
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
        });
        function account_save(){
            var type = document.getElementById('type').value;
            var list = document.getElementById('list').value;
            var amount = document.getElementById('amount').value;
            var description = document.getElementById('description').value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{url("account.insert")}}' ,
                type: "POST",
                data: $('#account_create_form').serialize(),
                success: function(data) {
                    console.log(data.errors);
                    if(data.errors.type){
                        console.log("Errors -> Type");

                    }
                }
            });
        }
        // function account_form(){
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         url: '/account/account.form' ,
        //         type: "POST",

        //         success: function(data) {
        //             document.getElementById('modal-title').innerHTML='Create Account';
        //             document.getElementById('modal-body').innerHTML=data;
        //             // console.log(data.errors);

        //         }
        //     });
        // }
    </script>
    <div class="row">
        <div class="col-lg-10">
            <h2>Account</h2>
        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-secondary" id="btn-add" data-toggle="modal"  data-target="#formModal">Add</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        {{-- <form action="{{url('account.insert')}}" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="">Type </label>
                            </div>
                            <div class="form-group col-md-3">
                                <input class="form-check-input" type="radio" name="type" id="type" value="revenue">
                                <label class="form-check-label" for="exampleRadios1">
                                    Revenue
                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <input class="form-check-input" type="radio" name="type" id="type" value="expenses">
                                <label class="form-check-label" for="exampleRadios1">
                                    Expenses
                                </label>
                            </div>
                            @error('type')
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">List </label>
                            <input type="text" class="form-control" id="list" name="list">
                            @error('list')
                            <span class="text-danger">{{ $errors->first('list') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Amount </label>
                            <input type="text" class="form-control" id="amount" name="amount">
                            @error('amount')
                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Receipt</label>
                            <input type="file" class="form-control-file" id="receipt">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}
        </div>
    </div>
        <!-- Modal -->

    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="account_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <span class="text-danger" id="text-errors" style="display:none">
                                        <ul></ul>
                                    </span>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="">Type </label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input class="form-check-input" type="radio" name="type" id="type" value="revenue">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Revenue
                                            </label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input class="form-check-input" type="radio" name="type" id="type" value="expenses">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Expenses
                                            </label>
                                        </div>
                                        <span class="text-danger" id="text-type"><ul></ul></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">List </label>
                                        <input type="text" class="form-control" id="list" name="list">
                                        <span class="text-danger" id="text-list"><ul></ul></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Amount </label>
                                        <input type="text" class="form-control" id="amount" name="amount">
                                        <span class="text-danger" id="text-amount"><ul></ul></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        <span class="text-danger" id="text-description"><ul></ul></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Receipt</label>
                                        <input type="file" class="form-control-file" id="receipt" name="receipt">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection
