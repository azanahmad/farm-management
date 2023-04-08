<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('admin/assets/js/dashmix.core.min.js') }}"></script>

<!--
    Dashmix JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at assets/_js/main/app.js
-->



<script src="{{ asset('admin/assets/js/dashmix.app.min.js') }}"></script>

<script src="{{asset('admin/assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('admin/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('admin/assets/js/pages/op_auth_signup.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('admin/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin/assets/js/ajax.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('admin/assets/js/pages/be_tables_datatables.min.js')}}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-right-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "0",
        "background": "green",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }


            @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    function change_click()
    {
        $('#button').hide();
        $('#button3').hide();

        $('#button2').show();
    }

    function change_click1()
    {
        $('#button3').hide();

        $('#button4').show();
    }


</script>
<script src="{{asset('admin/assets/krajee_js/sortable.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/krajee_js/fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/krajee_js/theme.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/js/cloneData.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/ckeditor5-classic/build/ckeditor.js')}}"></script>

<!-- Page JS Helpers (CKEditor 5 plugins) -->
<script>jQuery(function(){Dashmix.helpers(['select2','ckeditor5']);});</script>

{{--
<script>
    $(document).ready(function() {
        var max_fields      = 100;
        var wrapper         = $(".container1");
        var add_button      = $(".add_form_field");


        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            var i=Math.random();


            if(x < max_fields){
                x++;
                $(wrapper).append('<div class="content" id="id'+x+'"> <div class="block block-rounded"> <div class="block-header block-header-default"><h3 class="block-title">Add Question</h3></div> <div class="block-content"> <form method="get" action="">\n<div class="container"><div class="row"><div class="col-md-8"><label>Add Question<span style="color: red">*</span></label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">\n'+'<i class="fa fa-pager"></i>\n' + ' </span> </div><input type="text"  class="form-control"  name="addquestion" placeholder="Question"/></div></div></div></div><br><div class="container"><div class="row"><div class="col-md-8"><label>Question Description<span style="color: red">*</span></label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">\n'+'<i class="fa fa-pager"></i>\n' + ' </span> </div><input type="text"  class="form-control"  name="detail" placeholder="Description"/></div></div></div> <br> <div class="row"><div class="col-md-6"> <div class="input-group"> <button type="submit" class="btn btn-hero-success mr-1 mb-3">Save</button> <button type="button" class="btn btn-hero-danger mr-1 mb-3 add_form_field delete" style="margin: 0 30px;"><i class="fa fa-fw fa-recycle mr-1"></i>Delete</button></form></div>   </div>  </div></div></div></div></div>'); //add input box
            }
            else
            {
                alert('You Reached the limits')
            }
        });



        $(wrapper).on("click",".delete", function(e){
            e.preventDefault();

            var go = $(this).attr('id');

            $('#' + go  +  '').remove();


        })
    });
</script>--}}
{{--<script>--}}
{{--    $('#add-more').cloneData({--}}
{{--        mainContainerId: 'main-container1', // Main container Should be ID--}}
{{--        cloneContainer: 'container-item', // Which you want to clone--}}
{{--        removeButtonClass: 'remove-item', // Remove button for remove cloned HTML--}}
{{--        removeConfirm: true, // default true confirm before delete clone item--}}
{{--        removeConfirmMessage: 'Are you sure want to delete?', // confirm delete message--}}
{{--       // append: '<a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger remove-social-media">Remove</a>', // Set extra HTML append to clone HTML--}}
{{--        minLimit: 1, // Default 1 set minimum clone HTML required--}}
{{--        maxLimit: 5, // Default unlimited or set maximum limit of clone HTML--}}
{{--        defaultRender: 1,--}}
{{--        init: function () {--}}
{{--            console.info(':: Initialize Plugin ::');--}}
{{--        },--}}
{{--        beforeRender: function () {--}}
{{--            console.info(':: Before rendered callback called');--}}
{{--        },--}}
{{--        afterRender: function () {--}}
{{--            console.info(':: After rendered callback called');--}}
{{--            //$(".selectpicker").selectpicker('refresh');--}}
{{--        },--}}
{{--        afterRemove: function () {--}}
{{--            console.warn(':: After remove callback called');--}}
{{--        },--}}
{{--        beforeRemove: function () {--}}
{{--            console.warn(':: Before remove callback called');--}}
{{--        }--}}

{{--    });--}}

{{--    /*$('.select2').select2({--}}
{{--        placeholder: 'Select a month'--}}
{{--    });*/--}}



{{--    // Replace the <textarea id="editor1"> with a CKEditor--}}
{{--    // instance, using default configuration.--}}
{{--    /*CKEDITOR.editorConfig = function (config) {--}}
{{--        config.language = 'es';--}}
{{--        config.uiColor = '#F7B42C';--}}
{{--        config.height = 300;--}}
{{--        config.toolbarCanCollapse = true;--}}

{{--    };*/--}}
{{--    //CKEDITOR.replace('editor1');--}}




{{--</script>--}}

