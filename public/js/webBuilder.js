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
var item_html;
function deleteItem(el) {
    console.log(el);
    if (el.parentNode.parentNode.id) {
        $(document).on("click", ".deleteElement", function (e) {
            console.log(el);
            $("#" + el.parentNode.parentNode.id).remove();
        });
    }
}


function addStyle(el) {
    console.log(el);
    console.log(el);
    $("." + "add_style_model").toggleClass("hidden");
}

$(".cancel_model").click(function () {
    $("." + "add_style_model").toggleClass("hidden");
});


// add Link to component
function toggleAddLink(event) {
    //event is the element that triggered the function

    item_html = event;
    console.log('item_html', item_html);
    $(".add_link_model").toggleClass("hidden");
}

function toggleLinkData(event) {
    console.log('inside toggleLinkData');
    $(".link_data_model").toggleClass("hidden");
}
function saveLinkData(e) {
    var link_name = $('#link_name').val();
    var link_data = $('#link_data').val();
    var link_id = (performance.now().toString(36) + Math.random().toString(36)).replace(/\./g, "");
    let item_html_new = item_html.parentNode.parentNode.childNodes[1]
    let item_replace = $(item_html_new).html();
    // $(item_html).replaceWith($(item_html).attr('href', 'http://www.live.com/'));
    // console.log('item_html2', item_html);
    console.log('item_html2', item_html_new);
    $(item_html.parentNode.parentNode.childNodes[1]).replaceWith(
        `<a href=` + link_data + `> ` +
        item_replace +
        `</a>`);
    console.log('item_html3', item_html.parentNode.parentNode.childNodes);

    $.ajax({
        type: "POST",
        url: "http://{{ tenant('domain') }}/linkData",
        data: {
            // _token: "{{ csrf_token() }}",
            page_id: link_id,
            component_className: link_name,
            link_name: link_name,
            link_data: link_data,
        },
        success: function (data) {
            console.log(data);
        }
    });
}

// toggle delete button of componenent
function toggleBorder(event) {
    let deleteButtonId =
        event.target.parentNode.parentNode.parentNode.childNodes[1]
            .childNodes[1];
    let border_id = event.target.parentNode.parentNode.parentNode.id;


    console.log("-------------------------");
    // console.log(deleteButtonId.id.length && !deleteButtonId.classList.contains("canvas"));

    // console.log("border_id", border_id);
    // console.log("DELETE", (deleteButtonId.id));
    // console.log("deleteButtonId",event.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].id);
    if (
        !(deleteButtonId === undefined) &&
        !deleteButtonId.classList.contains("canvas")
    ) {
        console.log(deleteButtonId.id);
        $("#" + deleteButtonId.id).toggleClass("hidden transition ease-in-out delay-50");
    }
}
