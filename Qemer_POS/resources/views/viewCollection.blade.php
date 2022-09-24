@section('content')
@extends('Templates.stockCollection')
@extends('Templates.company-report')
@extends('Templates.sidebar')

@extends('Templates.Modals.addNewItem')
@extends('Templates.Modals.addCategories')
@extends('Templates.Modals.changeBranch')


@endsection
@extends('layouts.app')

@push('scripts')
    <script>
        window.addEventListener('respond', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                    Toast.fire({
                    icon: e.detail.icon,
                    title: e.detail.title
                })
        });
    </script>
@endpush