<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/js.js') }}"></script>
<script src="{{ asset('vendors/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
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
                            // Qty === 0 reload trang
                            if (data.qty === 0) {
                                window.setTimeout(() => {
                                    window.location.reload();
                                }, 500);
                            }
                            if (data.status == 'success') {
                                // xóa thẻ tr
                                row.remove();
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
<!-- Hiển thị lỗi -->
@if ($errors->any())
@foreach ($errors->all() as $error )
@php
toastr()->error($error)
@endphp
@endforeach
@endif
<!-- end -->

@stack('script')