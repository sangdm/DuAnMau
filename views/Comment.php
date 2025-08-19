<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .star-rating {
        font-size: 1.5rem;
        color: #ffc107;
        cursor: pointer;
    }

    .star-rating .bi-star-fill {
        color: #ffc107;
    }

    .rating-star:hover,
    .rating-star:hover~.rating-star {
        color: #ffc107;
    }
</style>
<div class="container mt-5">
    <h2 class="mb-3">Product Rating</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h1 class="display-4 mt-3 mb-4">4.8</h1>
                    <div class="mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                    </div>
                    <h6 class="text-muted">Based on 245 reviews</h6>
                </div>
                <div class="col-md-8">
                    <div class="rating-bars">
                        <div class="rating-bar mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>5 stars</span>
                                <small class="text-muted">70%</small>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rating-bar mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>4 stars</span>
                                <small class="text-muted">20%</small>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rating-bar mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>3 stars</span>
                                <small class="text-muted">5%</small>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rating-bar mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>2 stars</span>
                                <small class="text-muted">3%</small>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 3%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rating-bar">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>1 star</span>
                                <small class="text-muted">2%</small>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center mt-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal">Write a Review</button>
            </div>
        </div>
    </div>
</div>

<!-- Rating Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Your Rating</label>
                        <div class="star-rating">
                            <i class="bi bi-star rating-star" data-rating="1"></i>
                            <i class="bi bi-star rating-star" data-rating="2"></i>
                            <i class="bi bi-star rating-star" data-rating="3"></i>
                            <i class="bi bi-star rating-star" data-rating="4"></i>
                            <i class="bi bi-star rating-star" data-rating="5"></i>
                        </div>
                        <input type="hidden" id="rating" name="rating" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="review" class="form-label">Your Review</label>
                        <textarea class="form-control" id="review" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit Review</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                ratingInput.value = rating;
                resetStars();
                for (let i = 0; i < rating; i++) {
                    stars[i].classList.remove('bi-star');
                    stars[i].classList.add('bi-star-fill');
                }
            });
        });

        function resetStars() {
            stars.forEach(star => {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            });
        }
    });
</script>