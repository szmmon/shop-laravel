@if (session('status'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button"
                    class="btn-close btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
                    </button>
                </div>
            </div>
        </div>
@endif