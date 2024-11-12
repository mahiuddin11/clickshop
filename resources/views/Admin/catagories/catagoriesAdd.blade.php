@extends('layouts.admin')

@section('contant')
    <main>
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>catagorie infomation</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="#">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                <div class="text-tiny">catagories</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">New catagorie</div>
                        </li>
                    </ul>
                </div>
                <!-- new-category -->
                <div class="wg-box">
                    <form class="form-new-product form-style-1" action="{{ route('admin.catagorie.store') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        <fieldset class="name">
                            <div class="body-title">catagorie Name <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="catagorie name" name="name" tabindex="0"
                                value="{{ old('name') }}" aria-required="true" required="">
                        </fieldset>


                        @error('name')
                            <span class=" alert alert-danger text-center">{{ $message }}</span>
                        @enderror

                        <fieldset class="name">
                            <div class="body-title">catagorie Slug <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="catagorie Slug" name="slug" tabindex="0"
                                value="{{ old('slug') }}" aria-required="true" required="">
                        </fieldset>
                        @error('slug')
                            <span class=" alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                        <fieldset>
                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                            </div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="upload-1.html" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Drop your images here or select <span class="tf-color">click
                                                to browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        @error('image')
                            <span class=" alert alert-danger text-center">{{ $message }}</span>
                        @enderror

                        <div class="bot">
                            <div></div>
                            <button class="tf-button w208" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>

        $(function() {
             //image privew show function
            $("#myFile").on("change", function(e) {
                const photoInd = $("#myFile");
                const [file] = this.files;
                if (file) {
                    $("#imgpreview img").attr('src', URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            });

            //slug value change

            $("input[name='name']").on("change", function() {
                $("input[name='slug']").val(StringToSlug($(this).val()));
            });

            // slug text convert
            function StringToSlug(Text) {
                return Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
            }

        });
    </script>
@endpush
