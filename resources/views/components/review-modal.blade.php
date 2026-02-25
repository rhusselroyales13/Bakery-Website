<link rel="stylesheet" href="{{ asset('css/modal.css') }}">



<div id="reviewModal" class="modal-review">
    <div class="modal-content-review">


        <!-- route expects /products/{product}/rate -->

        <form id="reviewForm" action="{{ route('customer.rate', ['product' => $product->id]) }}" method="POST">
            @csrf
            <textarea name="review" rows="4" placeholder="Write your Review ..."></textarea>
            
            <div class="star-rating">
                @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"
                           @checked(optional($product->ratings->where('user_id', Auth::id())->first())->rating == $i)>
                    <label for="star{{ $i }}">★</label>
                @endfor
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
