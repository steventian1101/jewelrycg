@php
use App\Models\CurrentRate;
$current_rate = CurrentRate::getLastRate();
@endphp
<style>
    .cal-select-item.active {
        border: 2px solid blue !important;
    }
    .diamondtype-select-item.active {
        border: 2px solid blue !important;
    }
</style>
@if (count($arrProductMaterials))
<div class="show-model-specs">
    <div class="show-specs-btn d-none d-lg-block mb-3 text-uppercase fw-700 border p-3">
        COST TO MAKE CALCULATOR
    </div>
    <a class="show-specs-btn d-lg-none mb-4 pb-2 d-block text-uppercase fw-700 card p-3"
        data-toggle="collapse" href="#showGold" role="button" aria-expanded="false"
        aria-controls="showGold">COST TO MAKE CALCULATOR <span class="las la-angle-down"></span></a>
</div>
<div class="card">
    <div class="card-body">
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#"
                        aria-expanded="true" aria-controls="">
                        Step1: Select the metal below you want to make this item with.
                    </button>
                </h2>
                <div id="">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($arrProductMaterials as $product_material)
                                @php
                                    $type_name = $product_material->material_type_name;
                                    $type_id = $product_material->material_type_id;
                                    $material_weight = $product_material->material_weight;
                                    $material_dwt = $material_weight * 0.64301;

                                    if ($current_rate == null) {
                                        $price = 0;
                                        $price_change = 0;
                                    } else {
                                        if (strpos('24K', $type_name) != -1) {
                                            $rate = $current_rate['24k'];
                                        } else if (strpos('22K', $type_name) != -1) {
                                            $rate = $current_rate['22k'];
                                        } else if (strpos('18K', $type_name) != -1) {
                                            $rate = $current_rate['18k'];
                                        } else if (strpos('14K', $type_name) != -1) {
                                            $rate = $current_rate['14k'];
                                        } else if (strpos('10K', $type_name) != -1) {
                                            $rate = $current_rate['10k'];
                                        }

                                        $price = number_format($material_weight * $rate, 2, '.', ',');
                                    }
                                @endphp

                                <div class="col-lg-4 col-6">
                                    <div class="border p-3 item-value-card mb-3 cal-select-item" data-metal_id="{{$type_id}}">
                                        <div class="item-value-card-body">
                                            <div class="value-title pb-2 mb-2 text-uppercase fw-700">
                                                {{ $type_name }}
                                            </div>
                                            <div class="py-1">
                                                <span class="value-price">${{ $price }}</span>
                                                <input type="hidden" name="metal_price" class="metal_price" value="{{ $price }}" />
                                                <input type="hidden" name="metal_price_rate" class="metal_price_rate" value="{{ round($rate, 2) }}" />
                                                <input type="hidden" name="metal_weight" class="metal_weight" value="{{ $material_weight }}" />
                                            </div>
                                            <div class="py-1 fw-700 fs-24">{{ $material_weight }} Grams</div>
                                            <div class="py-1 fw-700 fs-14">{{ $material_dwt }} DWT</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <h2 class="accordion-header" id="">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#"
                        aria-expanded="true" aria-controls="">
                        Step2: Select the type of diamond you want to below.
                    </button>
                </h2>
                <div>
                    <div class="accordion-body">
                        <div class="row">                        
                            <div class="col-lg-6 col-6">
                                <div class="border p-3 item-value-card mb-3 diamondtype-select-item" data-diamondtype_id="1">
                                    <div class="item-value-card-body">
                                        <div class="py-1 fw-700 fs-24">Natural Diamonds</div>
                                        <div class="py-1 fw-700 fs-14">Natural Diamonds</div>
                                    </div>
                                </div>
                            </div>                        
                            <div class="col-lg-6 col-6">
                                <div class="border p-3 item-value-card mb-3 diamondtype-select-item" data-diamondtype_id="2">
                                    <div class="item-value-card-body">
                                        <div class="py-1 fw-700 fs-24">Lab Diamonds</div>
                                        <div class="py-1 fw-700 fs-14">Lab Diamonds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-body">
                    <div class="card strpied-tabled-with-hover rounded-0">
                        <div class="table-full-width">
                            <div class="col-md-12">
                                <table id="product_total_estimate_price" class="table table-lg table-thead-bordered table-nowrap table-align-middle card-table dataTable table-responsive no-footer">
                                    <thead>
                                        <th>Estimated Cost</th>
                                        <th id="total_estimate_price"></th>
                                    </thead>
                                    <tbody>
                                        <tr class="metal_price">
                                            <td class="metal_price_category"></td>
                                            <td class="metal_total_price"></td>
                                        </tr>
                                        
                                        @foreach ($arrProductDiamonds as $diamond)
                                            <tr class="natural_price">
                                                <td class="product_diamond_category">{{ $diamond->mm_size }} mm ({{$diamond->tcw}} * ${{ $diamond->diamond_amount * $diamond->natural_price }})</td>
                                                <td class="product_diamond_price">${{ ($diamond->tcw * $diamond->diamond_amount * $diamond->natural_price) }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($arrProductDiamonds as $diamond)
                                            <tr class="lab_price">
                                                <td class="product_diamond_category">{{ $diamond->mm_size }} mm ({{$diamond->tcw}} * ${{ $diamond->diamond_amount * $diamond->lab_price }})</td>
                                                <td class="product_diamond_price">${{ ($diamond->tcw * $diamond->diamond_amount * $diamond->lab_price) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    var diamondtype_id = 1;
    var estimatedPrice = 0;
    $('.cal-select-item').first().addClass('active');
    var metal_category = $('.cal-select-item.active .value-title').html()
    var metal_price = $('.cal-select-item.active .value-price').html()
    var metal_price_rate = $('.cal-select-item.active .metal_price_rate').val()
    var metal_weight = $('.cal-select-item.active .metal_weight').val()
    var td_data = metal_category + ' - ($' + metal_price_rate + '/gram * ' + metal_weight + 'gram)';
    $('.metal_price_category').html(td_data)
    $('.metal_total_price').html(metal_price)

    $('.diamondtype-select-item').first().addClass('active')
    diamondtype_id = $('.diamondtype-select-item.active').data('diamondtype_id')
    if(diamondtype_id == 1) {
        $('.natural_price').show()
        $('.lab_price').hide()
    } else {
        $('.natural_price').hide()
        $('.lab_price').show()
    }
    getEstimatePrice()

    $('.cal-select-item').on('click', function(){
        $('.cal-select-item').removeClass('active')
        $(this).addClass('active')
        var metal_category = $('.cal-select-item.active .value-title').html()
        var metal_price = $('.cal-select-item.active .value-price').html()
        var metal_price_rate = $('.cal-select-item.active .metal_price_rate').val()
        var metal_weight = $('.cal-select-item.active .metal_weight').val()
        var td_data = metal_category + ' - ($' + metal_price_rate + '/gram * ' + metal_weight + 'gram)';
        $('.metal_price_category').html(td_data)
        $('.metal_total_price').html(metal_price)
        var type_id = $(this).data('type_id')
        getEstimatePrice()
    })
    $('.diamondtype-select-item').on('click', function(){
        $('.diamondtype-select-item').removeClass('active')
        $(this).addClass('active')
        diamondtype_id = $(this).data('diamondtype_id')
        if(diamondtype_id == 1) {
            $('.natural_price').show()
            $('.lab_price').hide()
        } else {
            $('.natural_price').hide()
            $('.lab_price').show()
        }
        getEstimatePrice()
    })
    function getEstimatePrice(){
        var estimatedPrice = 0;
        var metal_price = Number(($('.cal-select-item.active .value-price').html()).replace('$','').replace(',',''))
        estimatedPrice += metal_price
        diamondtype_id = $('.diamondtype-select-item.active').data('diamondtype_id')
        if(diamondtype_id == 1) {
            $('.natural_price .product_diamond_price').map(function(idx, ele){
                estimatedPrice += Number(($(ele).html()).replace('$', ''))
            })
        } else {
            $('.lab_price .product_diamond_price').map(function(idx, ele){
                estimatedPrice += Number(($(ele).html()).replace('$', ''))
            })
        }
        $('#total_estimate_price').html('$'+estimatedPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'))
    }
</script>