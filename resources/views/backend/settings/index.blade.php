@extends('backend.layouts.app', ['activePage' => 'page', 'title' => 'General Settings', 'navName' => 'addpost', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Settings</h1>
    </div>
    <!-- End Row -->
</div>
    <form action="{{ route('backend.page.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                @csrf
                <div class="card col-md-12 mb-4">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">General</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="name" class="w-100 mb-2">Site Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Meta Title:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="desc" class="w-100 mb-2">Meta Description:</label>
                            <textarea name="post" id="desc" rows="6" class="form-control">{{ old('post') }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Twitter:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Instagram:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Facebook:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="w-100 mb-2">Youtube:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card col-md-12">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Stripe Settings</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Stripe Key:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Stripe Secret:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card col-md-12">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">SMTP Settings</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Stripe Key:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Stripe Secret:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card col-md-12">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title mb-0">Recaptcha Settings</h4>
                    </div>
                    <!-- End Header -->
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Stripe Key:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="meta_title" class="w-100 mb-2">Stripe Secret:</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
        <!-- Card -->
        <div class="card card-sm bg-dark border-dark mx-2">
          <div class="card-body">
            <div class="row justify-content-center justify-content-sm-between">
              <div class="col">
                <button type="button" class="btn btn-danger">Cancel</button>
              </div>
              <!-- End Col -->

              <div class="col-auto">
                <div class="d-flex gap-3">
                  <button type="button" class="btn btn-light">Save Draft</button>
                  <button type="submit" class="btn btn-primary">Publish</button>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
        <!-- End Card -->
      </div>
    </form>

@endsection

@section('js_content')
   
@endsection
