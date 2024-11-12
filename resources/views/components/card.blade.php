@props(['title','count' => 0])
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <i class="mdi mdi-emoticon font-20 text-muted"></i>
                        <p class="font-16 m-b-5">{{ $title }}</p>
                    </div>
                    <div class="ml-auto">
                        <h1 class="font-light text-right">{{ $count }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>