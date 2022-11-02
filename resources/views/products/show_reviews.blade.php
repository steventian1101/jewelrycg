<div>
    {!! $arrReviewListing->links() !!}
</div>

@foreach ($arrReviewListing as $review)
    <div class="user-review-item pb-2 mb-4">
        <div class="row">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <img id="fileManagerPreview" src="{{ $review->user->uploads->getImageOptimizedFullName(100,100) }}" class="reviewer_avatar rounded-circle h-60px mr-10px">
                    <div class="review-details-meta">
                        <div class="fs-20 fw-600 reviewer_name w-100">{{ $review->user->first_name }} {{ $review->user->last_name }}</div>
                        <div class="row">
                            <div class="col-auto pr-0">
                                <div class="star-ratings star-ratings-sm">
                                    <div class="fill-ratings" style="width: {{ $review->rating * 100 / 5 }}%;">
                                        <span>★★★★★</span>
                                    </div>
                                    <div class="empty-ratings">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="rated_date fs-16 opacity-70">Rated at {{ $review->updated_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div>
                    {{ $review->review }}
                </div>
            </div>
        </div>
    </div>
@endforeach

<div>
    {!! $arrReviewListing->links() !!}
</div>

<script>
$('.star-ratings').each(function() {
    var star_rating_width = $('.fill-ratings span', this).width();
    $(this).width(star_rating_width);
});
</script>
