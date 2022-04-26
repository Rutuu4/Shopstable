// $(".deleteElement").click(function (e) {
//     console.log("SCXZCZCZV  " + e.target.parentNode.parentNode.id);
//     $(e.target.parentNode.parentNode.id).remove();
// });
// $(".deleteElement").click(function () {
//     console.log(this.parentNode.id);
//     $("#" + this.parentNode.parentNode.id).remove();
// });
$(".container").hover(function (el) {
    $(this).toggleClass("border");
});
function deleteItem(el) {
    console.log(el);
    // $(document).on("click", ".deleteElement", function (e) {
    // console.log(this.parentNode.parentNode.id);
    $("#" + el.parentNode.parentNode.id).remove();
    // });
}

function toggleBorder(event) {
    let deleteButtonId =
        event.target.parentNode.parentNode.parentNode.childNodes[1]
            .childNodes[1].id;

    console.log(
        event.target.parentNode.parentNode.parentNode.childNodes[1]
            .childNodes[1].id
    );

    let border_id = event.target.parentNode.parentNode.parentNode.id;
    console.log("border_id", border_id);
    // console.log("DELETE", deleteButtonId);
    console.log(
        "deleteButtonId",
        event.target.parentNode.parentNode.parentNode.childNodes[1]
            .childNodes[1].id
    );

    $("#" + deleteButtonId).toggleClass("hidden");
    $("#" + border_id).toggleClass("border");
    $("#" + border_id).toggleClass("my-10");
}
