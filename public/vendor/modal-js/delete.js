// Delete Confirm
$(".delete-confirm").click(function(e) {
    id = e.target.dataset.id;
    e.preventDefault();

    swal({
        title: "Are you sure?",
        text: "Maybe some course related and it will be deleted too!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then(willDelete => {
        if (willDelete === true) {
            $(`#delete-form-${id}`).submit();
        } else {
            swal("Your imaginary file is safe!");
        }
    });
});
