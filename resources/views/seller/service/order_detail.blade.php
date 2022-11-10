<x-app-layout :page-title="'ORDER #' . $order->order_id">
<div class="container">
    <div class="col-lg-11 col-md-10 py-9 mx-auto checkout-wrap">
        <div class="row">
            <div class="col-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="fw-700">Order Started</h4>
                        @if ($order->status == 0)
                        <p class="p-0">Pending requirements in order to start job. Contact to <b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> and let them know to submit the requirements.</p>
                        @else
                        <p class="p-0"><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> sent all the information you need so you can start working on this order. You got this!</p>
                        @endif
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="timeline-item pt-2 pb-4 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class=""><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> placed the order {{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</span>
                        </div>
                        @if ($order->status != 0 && count($order->service->requirements) )
                        <div class="timeline-item pt-2 pb-4 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class=""><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> sent the requirements {{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-4 time-left">
                    <div class="card-body">
                        @if ($order->status != 0)
                        <div class="col-md-12" id="count_title">
                          Time left to deliver
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center my-2">
                          <div class="d-flex flex-column align-items-center" style="width: 23%;">
                            <h5 id="count_day">00</h5>
                            <p class="opacity-70 mb-0">Days</p>
                          </div>
                          <div class="bg-black opacity-70" style="width: 1px; height: 30px;"></div>
                          <div class="d-flex flex-column align-items-center" style="width: 23%;">
                            <h5 id="count_hour">00</h5>
                            <p class="opacity-70 mb-0">Hours</p>
                          </div>
                          <div class="bg-black opacity-70" style="width: 1px; height: 30px;"></div>
                          <div class="d-flex flex-column align-items-center" style="width: 23%;">
                            <h5 id="count_min">00</h5>
                            <p class="opacity-70 mb-0">Minutes</p>
                          </div>
                          <div class="bg-black opacity-70" style="width: 1px; height: 30px;"></div>
                          <div class="d-flex flex-column align-items-center" style="width: 23%;">
                            <h5 id="count_sec">00</h5>
                            <p class="opacity-70 mb-0">Seconds</p>
                          </div>
                        </div>
                        <a class="btn btn-primary" href="#">Deliver Now</a>
                        @else
                        <div class="col-md-12">
                          Didn't receive requirement yet
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card mb-4 order-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ $order->service->thumb->getImageOptimizedFullName(150) }}" alt="" class="thumbnail border w-100">
                            </div>
                            <div class="col-9">
                                <h4>{{ $order->service->name }}</h4>
                                <span class="d-block rounded border" data-item-id="{{ $order->id }}">
                                    {{ 'Status: ' . Config::get('constants.service_order_status')[$order->status] }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (count($answers) > 0)
        <div class="col">
          <h1>Order Requirements</h1>
          @foreach ($answers as $answer)
          <div class="col">
            <h3>{{ $answer->requirement->question }}</h3>

            @if ($answer->requirement->type == 0)
            <p>{{ $answer->answer }}</p>

            @elseif ($answer->requirement->type == 1)
            @foreach ($answer->attaches as $attach)
            <a href="/uploads/all/{{ $attach->file_name }}" download>
              {{ $attach->original_file_name . "." . $attach->extension }}
            </a>
            @endforeach

            @elseif ($answer->requirement->type == 2)
            <p>{{$answer->answer}}</p>
            @else
            @foreach ($answer->answers as $answer)
            <p>{{ $answer }}</p>
            @endforeach
          </div>
          @endforeach
        </div>
    </div>
</div>
@section('js')
<script>
  var countDownDate = new Date("{{ $order->original_delivery_time }}").getTime()

  function padLeadingZeros(num, size) {
    if (!num) return "00";
    if (num < 0) return "00";
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
  }

  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    $('#count_day').text(padLeadingZeros(days, 2));
    $('#count_hour').text(padLeadingZeros(hours, 2));
    $('#count_min').text(padLeadingZeros(minutes, 2));
    $('#count_sec').text(padLeadingZeros(seconds, 2));
    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      $('#count_title').text("Delivery time has already passed");
    }
  }, 1000);
</script>
@endsection

</x-app-layout>
