$(function() {
    var edit_form = document.getElementById("edit_form");
    var delete_form = document.getElementById("delete_form");
    edit_form.style.display = "none";
    $("#select_action").change(function() {
        if ($(this).val() == 2) {
            if (edit_form.style.display === "none") {
                delete_form.style.display = "none";
                edit_form.style.display = "block";
            }
        } else {
            edit_form.style.display = "none";
            delete_form.style.display = "block";
        }
    });
});