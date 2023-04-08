@extends('admin/theme/main')

@section('content')
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        Dashboard
                    </h1>
                    <p class="mb-0">
                        Welcome, {{Auth::user()->name}} !
                    </p>
                </div>

            </div>
        </div>
        <div class="content">
            <!-- Overview -->
            <div class="row row-deck">
                <div class="col-sm-6 col-xl-3">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-list text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{ \App\Models\Ingredient::count() }}</div>
                            <div class="text-muted mb-3">Ingredients</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('ingredients.list')}}">
                                View all ingredients
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-calculator text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{ \App\Models\Formula::count() }}</div>
                            <div class="text-muted mb-3">Formula</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('formula.list')}}">
                                View all formulas
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-shopping-bag text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{ \App\Models\Batch::count() }}</div>
                            <div class="text-muted mb-3">batch</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('batch.list')}}">
                                View all batches
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Orders + Stats -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <!--  Latest Orders -->
                    <div class="block block-rounded block-mode-loading-refresh">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Stock List
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">Code</th>
                                    <th>Ingredient</th>
                                    <th class="d-none d-sm-table-cell" style="width: 30%;">Price</th>
                                    <th class="d-none d-sm-table-cell" style="width: 30%;">Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;?>
                                @foreach(\App\Models\Ingredient::take('5')->get() as $row)
                                    <tr>
                                        <td>{{$row->code}}</td>
                                        <td>{{$row->name}}</td>
                                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{$row->price}}</em></td>
                                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{$row->quantity}} </em></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="block-content block-content-full block-content-sm bg-body-light font-size-sm text-center">
                            <a class="font-w500" href="{{route('stock.list')}}">
                                View all stock
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Latest Orders -->
                </div>
            </div>
        </div>
    </main>
@endsection
