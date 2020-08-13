$("#launch-modal-create").fireModal({
    title: "Fill this form",
    body: $("#modal-create"),
    footerClass: "bg-whitesmoke",
    autoFocus: true,
    buttons: [
        {
            text: "Submit",
            submit: true,
            class: "btn btn-primary btn-shadow",
            handler: function(modal) {}
        }
    ]
});
