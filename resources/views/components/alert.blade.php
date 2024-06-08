{{-- resources/views/components/alert.blade.php --}}
@if(session('message'))
    <div class="alert alert-{{ session('type', 'info') }} alert-dismissible fade show alert-float" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<style>
    .alert-float {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        width: auto;
        max-width: 300px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
