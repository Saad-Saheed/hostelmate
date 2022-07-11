@if(isset($hostelCategory))
<div class="container mb-3">
    <div id="carouselExampleIndicators" class="carousel carousel-fade slide" data-bs-ride="carousel">
      <div class="carousel-indicators">

        @foreach ($hostelCategory->photos as $key => $item)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : ''}}"
            aria-current="true" aria-label="Slide {{ ($key+1) }}"></button>
        @endforeach

      </div>
      <div class="carousel-inner w-100">

        @foreach ($hostelCategory->photos as $key => $item)
            <div class="carousel-item {{ ($key == 0) ? 'active' : ''}}">
                <img src="{{ asset('img/hostelcategories/'.$item->name)}}" class="d-block w-100" style="height:auto; max-height: 400px !important;" alt="...">
            </div>
        @endforeach

      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <div class="slide-icon">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </div>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <div class="slide-icon">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </div>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
@endif
