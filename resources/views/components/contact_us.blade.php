<div class="nk-widget" style="text-align: right">
    <h4 class="nk-widget-title"><span class="text-main-1"> ارتباط </span>با ما</h4>
    <div class="nk-widget-content">
        <form id="contact_us" url={{ route('contactUs') }}>
            <div class="row vertical-gap sm-gap">
                <div class="col-md-6">
                    <input type="email" class="form-control required" name="email" placeholder="ایمیل *">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control required" name="name" placeholder="* نام"
                        style="text-align: right">
                </div>
            </div>
            <div class="nk-gap"></div>
            <textarea class="form-control required" name="message" rows="5" placeholder="* متن پیام"
                style="text-align: right; max-height: 30vh;"></textarea>
            <div class="nk-gap-1"></div>
            <button type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white">
                <span>ارسال</span>
                <span class="icon"><i class="ion-paper-airplane"></i></span>
            </button>
            <div id="contact_us_ok" class="nk-form-response-success">پیام شما ارسال شد</div>
            <div id="contact_us_fail" class="nk-form-response-error">پیام شما ارسال نشد</div>
        </form>
    </div>
</div>
@section('script')
    <script src={{ asset('assets/js/custom.js') }}></script>
@endsection
