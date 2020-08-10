$("#modal-create").fireModal({
    title: "Fill this form",
    body: $("#modal-create-category"),
    footerClass: "bg-whitesmoke",
    autoFocus: true,
    buttons: [
        {
            text: "Submit",
            submit: true,
            class: "btn btn-primary btn-shadow",
            handler: function (modal) {},
        },
    ],
});
