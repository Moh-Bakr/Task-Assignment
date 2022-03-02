<script>
    document.addEventListener('DOMContentLoaded', () => {
        getSelectedType()
    })

    $('#productType').change(function () {
        getSelectedType()
    });

    function getSelectedType() {
        var products = $('#productType').val();
        var dvd = $('#dvd-form');
        var book = $('#book-form');
        var furniture = $('#furniture-form');
        switch (products) {
            case "DVD":
                dvd.removeClass('d-none');
                book.addClass('d-none');
                furniture.addClass('d-none');
                ClearDVD()
                break;
            case "Book":
                dvd.addClass('d-none');
                book.removeClass('d-none');
                furniture.addClass('d-none');
                ClearBook()
                break;
            case "Furniture":
                dvd.addClass('d-none');
                book.addClass('d-none');
                furniture.removeClass('d-none');
                ClearFurniture()
                break;
            default:
                dvd.addClass('d-none');
                book.addClass('d-none');
                furniture.addClass('d-none');
                break;
        }
    }

    function ClearDVD() {
        $("#weight").val(0);
        $("#height").val(0);
        $("#width").val(0);
        $("#length").val(0);
    }

    function ClearBook() {
        $("#size").val(0);
        $("#height").val(0);
        $("#width").val(0);
        $("#length").val(0);
    }

    function ClearFurniture() {
        $("#size").val(0);
        $("#weight").val(0);
    }


</script>