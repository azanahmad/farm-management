<div class="form-group form-row">
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success text-center">{{session('success')}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-center">{{session('error')}}</div>
        @endif
    </div>
</div>
