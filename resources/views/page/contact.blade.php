@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Contacts</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home') }}">Trang chủ</a> / <span>Contacts</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
{{--Google map--}}
<div class="beta-map">

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.506216769872!2d105.81010931435831!3d21.01242169371302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6217b72d3d%3A0x9d356afe0d288ce!2zMTA1IEzDoW5nIEjhuqEsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1522348981550"
			width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="container">
	<div id="content" class="space-top-none">

		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-8">
				<h2>Contact Form</h2>
				<div class="space20">&nbsp;</div>
				<!-- <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani m id est laborum.</p> -->
				<div class="space20">&nbsp;</div>
				<form action="#" method="post" class="contact-form">
					<div class="form-block">
						<input name="your-name" type="text" placeholder="Your Name (required)">
					</div>
					<div class="form-block">
						<input name="your-email" type="email" placeholder="Your Email (required)">
					</div>
					<div class="form-block">
						<input name="your-subject" type="text" placeholder="Subject">
					</div>
					<div class="form-block">
						<textarea name="your-message" placeholder="Your Message"></textarea>
					</div>
					<div class="form-block">
						<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
					<h2>Thông tin</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Số 25A, hẻm 76 ngách 26 phường Láng Hạ
						quận Đống Đa
						Hà Nội
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Phòng kinh doanh</h6>
					<p>
						 Để đáp ứng yêu cầu mở rộng sản xuất kinh doanh,<br>
						 Công ty TNHH Bakery HN cần tuyển thêm nhân viên kinh doanh mọi thông tin liên lạc vào địa chỉ<br>
						<a href="mailto:biz@betadesign.com">hoangnamww@hotmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Làm việc nhóm</h6>
					<p>
						Chúng tôi luôn tìm kiếm những người có tài để tham gia nhóm của chúng tôi <br>
						<a href="hr@betadesign.com">hoangnamww@hotmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
