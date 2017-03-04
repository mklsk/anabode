! function(e) {
    e(document).ready(function() {
        e("#homepage_items_metabox").hide(), e("#regular_page_metabox").hide();
        var t = e("#page_template"),
            h = e("#homepage_items_metabox"),
            i = e("#regular_page_metabox");
        t.change(function() {
            "homepage.php" == this.value || "full-width.php" == this.value || "default" == this.value ? (i.show(), h.hide()) : "section-blockquotes.php" == this.value || "section-clients.php" == this.value || "section-feature-left.php" == this.value || "section-feature-right.php" == this.value || "section-image-full-top.php" == this.value || "section-image-full.php" == this.value || "section-image-left.php" == this.value || "section-image-right.php" == this.value || "section-news-items.php" == this.value || "section-slider-full.php" == this.value || "section-slider-left-two.php" == this.value || "section-slider-left.php" == this.value || "section-slider-right-two.php" == this.value || "section-slider-right.php" == this.value || "section-text-banner.php" == this.value || "section-text-centered.php" == this.value || "section-text-full.php" == this.value || "section-video-full-top.php" == this.value || "section-video-full.php" == this.value || "section-video-left.php" == this.value || "section-video-right.php" == this.value ? (i.hide(), h.show()) : (i.hide(), h.hide())
        }).change()
    })
}(jQuery);