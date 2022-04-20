<div class="">
    <button class="deleteElement hover:bg-red-500">delete</button>
</div>

<script>
    $(".deleteElement").attr('id', Date.now().toString(36) + Math.random().toString(36).substr(2));

    $('.deleteElement').click(function() {
        console.log(this.parentNode.id);
        $('#' + this.parentNode.parentNode.id).remove();
    });

    function toggleBorder(event) {

        console.log(event.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].id)

        let deleteButtonId = event.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].id;
        let border_id = event.target.parentNode.parentNode.parentNode.id;
        console.log('border_id', border_id);

        $('#' + deleteButtonId).toggleClass("hidden");
        $("#" + border_id).toggleClass('border');
        $("#" + border_id).toggleClass('my-10');
    }

    $('#' + this.id).click(function(e) {
        $('#' + this.id).first().toggleClass("border");

        // // toggle delete button
        // $('.deleteElement').toggleClass("hidden");

        // Toggle Border
    })
</script>
