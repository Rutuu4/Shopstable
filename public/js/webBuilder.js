// $(".deleteElement").click(function (e) {
//     console.log("SCXZCZCZV  " + e.target.parentNode.parentNode.id);
//     $(e.target.parentNode.parentNode.id).remove();
// });
// $(".deleteElement").click(function () {
//     console.log(this.parentNode.id);
//     $("#" + this.parentNode.parentNode.id).remove();
// });
// $(".container").hover(function (el) {
//     $(this).toggleClass("border");
// });
var currentColorTheme = "indigo";
function deleteItem(el) {
    console.log(el);
    if (el.parentNode.parentNode.id) {
        $(document).on("click", ".deleteElement", function (e) {
            console.log(el);
            $("#" + el.parentNode.parentNode.id).remove();
        });
    }
}

function changeColor(color, el) {
    console.log(($(".pageBody").html()));
    console.log('color,', color);
    console.log('currentColorTheme', currentColorTheme);
    $(".changeColorClass").removeClass("ring-4 outline-none ring-" + currentColorTheme + "-300");
    $(".pageBody").html($(".pageBody").html().replaceAll(currentColorTheme, color));
    $(el).addClass("ring-4 outline-none ring-" + color + "-300");
    currentColorTheme = color;
    console.log(($(".pageBody").html()));
}

function addStyle(el) {
    console.log(el);
    console.log(el);
    $("." + "add_style_model").toggleClass("hidden");
}

$(".cancel_model").click(function () {
    $("." + "add_style_model").toggleClass("hidden");
});

function toggleBorder(event) {
    let deleteButtonId =
        event.target.parentNode.parentNode.parentNode.childNodes[1]
            .childNodes[1];

    console.log("-------------------------");
    console.log(
        deleteButtonId.id.length && !deleteButtonId.classList.contains("canvas")
    );

    let border_id = event.target.parentNode.parentNode.parentNode.id;
    console.log("border_id", border_id);
    // console.log("DELETE", deleteButtonId);
    console.log(
        "deleteButtonId",
        event.target.parentNode.parentNode.parentNode.childNodes[1]
            .childNodes[1].id
    );
    if (
        deleteButtonId.id.length &&
        !deleteButtonId.classList.contains("canvas")
    ) {
        $("#" + deleteButtonId.id).toggleClass("hidden transition ease-in-out delay-");
    }
}
