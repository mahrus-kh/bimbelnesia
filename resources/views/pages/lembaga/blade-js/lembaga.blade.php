<script type="text/javascript">
    $(document).ready(function () {
        getRecommendation()
    });
    function getRecommendation() {
        $.ajax({
            type: "GET",
            url: "{{ route('get.recommendation') }}",
            data: {slug:"{{ request()->segment(2) }}"},
            success:function (data) {
                $.each(data.first, function (key, value) {
                    value.verified === "1" ? status = '<i span class="fa fa-check-circle text-primary"></i>' : status = '';
                    $('.first').html($('.first').html() + '<h5>' + value.tutoring_agency + status + '</h5>\n' +
                        '<text class="text-warning">' + countStar(value.rating) + '</text> \n' +
                        '<p class="card-text">'+ value.description.substring(0,150) +'...</p>\n' +
                        '<a href="' + "{{ url('lembaga') }}/" + value.slug + '" class="btn btn-outline-primary font-weight-bold">Detail Lengkap &raquo;</a>\n' +
                        '<hr class="featurette-divider">')
                });

                $.each(data.second, function (key, value) {
                    value.verified === "1" ? status = '<i span class="fa fa-check-circle text-primary"></i>' : status = '';
                    $('.second').html($('.second').html() + '<a href="'+ "{{ url('lembaga') }}/" + value.slug +'" class="text-lbb">\n' +
                        '    <h5>' + value.tutoring_agency + status +'</h5>\n' +
                        '<text class="text-warning">' + countStar(value.rating) + '</text> \n' +
                        '    <div class="card-text text-dark">20 Feedback & Komentar &raquo;</div>\n' +
                        '</a>\n' +
                        '<hr class="featurette-divider">')
                });


            }
        });
    }
    function countStar(rating) {
        var starRating = ""
        for (var i=0; i<5; i++) {
            if (rating >= 1){
                starRating = starRating + ' <i class="fa fa-star"></i>'
            } else if (rating >= 0.5 && rating < 1 ) {
                starRating = starRating + ' <i class="fa fa-star-half-o"></i>'
            } else if (rating < 0.5) {
                starRating = starRating + ' <i class="fa fa-star-o"></i>'
            }
            rating = rating - 1
        }
        return starRating
    }
</script>