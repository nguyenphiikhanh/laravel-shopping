function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa sản phẩm này không?',
        text: "Chú ý: Không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có,xóa!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Thành công!',
                            'Sản phẩm đã được xóa.',
                            'success'
                        )
                    }
                },
                error: function (data) {

                }
            })

        }
    });
}


$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});