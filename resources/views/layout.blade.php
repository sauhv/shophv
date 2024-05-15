@include('inc.head')

<body>
    @include('inc/header')

    <main style="background-color: #F5F5F7;" class="master_page">
        @yield('content')
    </main>
    @include('inc/footer')
</body>
@if ($errors->any())
@foreach ($errors->all() as $error )
    @php
        toastr()->error($error)
    @endphp
@endforeach    
@endif
<script type="text/javascript">
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.btn-delete', function(e) {
            event.preventDefault();
            let urlDelete = $(this).attr('data-url');
            let row = $(this).closest('tr');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: urlDelete,
                        success: function(data) {
                            if (data.status == 'success') {
                                // row.remove();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: data.message,
                                    icon: "success"
                                });
                            } else {
                                Swal.fire({
                                    title: "Can't Deleted!",
                                    text: "Your file can't deleted.",
                                    icon: "error"
                                });
                            }
                            window.setTimeout(() => {
                                window.location.reload();
                            }, 500);
                        },
                        error: function(xhr, status, error) {
                            alert(error);
                        }
                    })
                }
            });
        });
    })
</script>
@include('inc.foot')
@stack('script')