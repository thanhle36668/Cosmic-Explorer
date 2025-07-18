$(document).ready(function () {
    function changeImageAndSetActive(thumbnailElement) {
        var imgSrc = $(thumbnailElement).attr("src");
        $("#parent").attr("src", imgSrc);
        $(".person img").removeClass("active-thumbnail");
        $(thumbnailElement).addClass("active-thumbnail");
    }

    $(".person img").click(function () {
        changeImageAndSetActive(this);
    });
});