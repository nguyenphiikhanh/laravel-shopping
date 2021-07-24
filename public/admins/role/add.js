$('.checkbox_wrapper').on('click',function() {
    $(this).parents('.card').find('.checkbox_children').prop('checked',$(this).prop('checked'));
});