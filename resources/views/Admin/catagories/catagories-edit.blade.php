@extends('layouts.admin')

@section('contant')
    <main>
        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>catagorie Information</h3>
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
                                <div class="text-tiny">Catagories</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Edit Catagorie</div>
                        </li>
                    </ul>
                </div>
                <!-- new-category -->
                <div class="wg-box">
                    <form class="form-new-product form-style-1" action="{{route('admin.catagorie.update', $catagorie->id)}}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$catagorie->id}}" />
                        <fieldset class="name">
                            <div class="body-title">catagorie Name <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="catagorie name" name="name" tabindex="0"
                                value="{{ $catagorie->name }}" aria-required="true" required="">
                        </fieldset>

                        @error('name')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror

                        <fieldset class="name">
                            <div class="body-title">catagorie Slug <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="text" placeholder="catagorie Slug" name="slug" tabindex="0"
                                value="{{ $catagorie->slug }}" aria-required="true" required="">
                        </fieldset>
                        @error('slug')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror

                        <fieldset>
                            <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                            <div class="upload-image flex-grow text-center align-items-center">
                                <div class="item" id="imgpreview" style="display: {{ $catagorie->image ? 'block' : 'none' }};">
                                    <img src="{{ asset('uploads/catagories/' . $catagorie->image) }}" class="effect8 " alt="">
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
                            <span class="alert alert-danger text-center">{{ $message }}</span>
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
            // ইমেজ প্রিভিউ দেখানোর ফাংশন
            $("#myFile").on("change", function(e) {
                const [file] = this.files;
                if (file) {
                    $("#imgpreview img").attr('src', URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            });

            // স্লাগ ভ্যালু পরিবর্তন ফাংশন
            $("input[name='name']").on("change", function() {
                $("input[name='slug']").val(StringToSlug($(this).val()));
            });

            // স্লাগ টেক্সট কনভার্টার
            function StringToSlug(Text) {
                return Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
            }
        });
    </script>
@endpush




