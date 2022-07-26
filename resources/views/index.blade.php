<x-app-layout page-class="homepage" page-title="Jewelry CG">

<section class="hero-content-container py-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="fs-20 text-black mb-4">The world's preferred source for Jewelry CG content</h4>
                <h1 class="text-black font-weight-bold mb-4">Explore our vast collections of 3D models</h1>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="card p-3">
                    <i class="fa-brands fa-twitter"></i>
                    <div class="title text-black">Pendant</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-points top-content-container pt-4 pb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="overflow-hidden col-md-4 position-relative mt-3">
                <!-- <div class="bg-overlay"> -->
                <div class="card mb-0">
                    <div class="d-block w-100 h-100 px-4 pt-4 pb-5">
                        <h2 class="text-black fw-700">Custom Design</h2>
                        <p class="text-black h6 font-weight-light" style="line-height: 1.5"> Anything you have in mind we can create! Do you have a ring, chain, or pendant idea in mind? Let us know and we can create a 3D model so it can be created. </p> <a href="https://districtties.com/product/custom-cad" class="btn btn-primary mt-4">Custom CAD Inquiry <i class="fa-solid fa-arrow-right"></i></a> </div>
                </div>
            </div>
            <div class="overflow-hidden col-md-4 position-relative mt-3">
                <!-- <div class="bg-overlay"> -->
                <div class="card mb-0 h-100">
                    <div class="d-block w-100 h-100 px-4 pt-4 pb-5">
                        <h2 class="text-black fw-700">Knowledge Base Blog</h2>
                        <p class="text-black h6 font-weight-light" style="line-height: 1.5"> Learn the behind the scenes process of how jewelry is made from start to finish. </p> <a class="btn btn-primary mb-3 mt-2" href="https://districtties.com/blog/category/knowledge-base">View Blog <i class="fa-solid fa-arrow-right"></i></a> </div>
                </div>
            </div>
            <div class="overflow-hidden col-md-4 position-relative mt-3">
                <!-- <div class="bg-overlay"> -->
                <div class="card mb-0 h-100">
                    <div class="d-block w-100 h-100 px-4 pt-4 pb-5">
                        <h2 class="text-black fw-700">Cost Analysis Blog</h2>
                        <p class="text-black h6 font-weight-light" style="line-height: 1.5"> See us breakdown what some of the most popular jewelry cost to make. </p> <a class="btn btn-primary mb-3 mt-2" href="https://districtties.com/blog/category/cost-analysis">View Blog <i class="fa-solid fa-arrow-right"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home_latest_product mt-4 mb-4">
    <div class="container-fluid">
        <div class="d-flex mb-3 align-items-baseline border-bottom">
            <h3 class="h5 fw-700 mb-0 w-100">
                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Recently Added Models</span>
            </h3>
            <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">20</a>
        </div>

        <x-products-display :products="$products"/>
        
    </div>
</section>
</x-app-layout>
