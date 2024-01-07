@extends('website::layouts.master')
@section('content')

    @include('website::user.breadcrumb-section')

    <section class="dashboard-content pt-40 pb-80 bg-light">
        <div class="container">
            <div class="row">
                @include('website::user.layouts.sidebar')
                <div class="col-md-9 content profile">
                    <div class="shadow-box form-wrapper">
                        <h4>Reviews</h4>
                        <div class="row">
                            @forelse ($ratingList as $r)
                                <div class="col-md-12 mb-4 review-card-wrapper">
                                    <div class="review-card">
                                        <div class="header mb-3">
                                            <img class="name-logo"
                                                src="{{ \Avatar::create(auth('customer')->user()->email)->toBase64() }}" />
                                            <div class="info">
                                                <p>{{ auth('customer')->user()->email }}</p>
                                                <div class="rating-wrapper">
                                                    @for ($i = 0; $i < $r->rating_value; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div>Wrote a review on {{ $r->created_at->format('d M Y') }}</div>
                                        </div>
                                        <h6>{!! $r->ratable_title !!}</h6>
                                        <p>{!! $r->review !!}</p>

                                        <!-- Button trigger edit modal -->

                                        <button type="button" class="btn btn-success btn-sm fw-600 text-primary" data-bs-toggle="modal"
                                            data-bs-target="#editRatingModal{{ $r->id }}">
                                            Edit
                                        </button>
                                        <!-- Button trigger delete modal -->
                                        <button type="button" class="btn btn-danger btn-sm fw-600 text-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteRatingModal{{ $r->id }}">
                                            Delete
                                        </button>
                                    </div>
                                </div>



                                <!--Delete Rating Modal -->
                                <div class="modal fade" id="deleteRatingModal{{ $r->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('website.delete.rating') }}" method="POST">
                                                @csrf

                                                <div class="modal-body">
                                                    Are you sure want to delete {{ $r->ratable_title }} ?
                                                    <input type="hidden" name="rating_id" value="{{ $r->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Edit Rating Modal -->
                                <div class="modal fade" id="editRatingModal{{ $r->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('website.update.rating') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="rating_id" value="{{ $r->id }}">
                                                <div class="modal-body">
                                                    <div class="reviews">
                                                        <div class="form-wrapper">
                                                            <div class="post-rating">
                                                     <!-- Rating Stars Box -->
                                                    <div class='rating-stars text-center'>
                                                        <ul class="list-unstyled d-flex stars">
                                                            <input type="hidden" class="rating_value" name="rating_value" value="{{ $r->rating_value }}">
                                                            @for ($i = 0; $i < 5 ; $i++)
                                                            @if ($i < $r->rating_value)
                                                            <li class='star selected' data-value='{{ $i+1 }}'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            @else
                                                            <li class='star' data-value='{{ $i+1 }}'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            @endif
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <div class="input-group ">
                                                            <textarea placeholder="Enter your review *" name="review" required id="" cols="30" rows="10"
                                                                class="form-control">{!! $r->review !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty 
                            <p>No reviews found</p>
                            @endforelse
                            {{ $ratingList->appends(request()->query())->links('website::layouts.pagination') }}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')

    <script>

$('.stars li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10);
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });
    $('.stars li').on('click', function () {
        var onStar = parseInt($(this).data('value'), 10);
        var stars = $(this).parent().children('li.star');
        $(this).closest('ul').find('.rating_value').val($(this).data('value'));
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

    });
    </script>

@endsection
