@extends('shared.main')
@section('content')

<div class="ticket-add-image-cover tc">
  <div class="jumbotron jumbotron-fluid mb0">
    <div class="container">
      <h1>บัตรคอนเสิร์ต ตั๋ว วอชเชอร์ และอื่นๆที่ไม่ได้ใช้แล้วสามารถนำมาขายได้ที่นี่</h1>
    </div>
  </div>
</div>

<div class="container">

  <div class="margin-top-40 margin-bottom-20">
    <h4>ขายบัตร</h4>
    <p>กรอกข้อมูลรายการขายของคุณให้ได้มากที่สุดเพื่อให้สินค้าของคุณมีรายละเอียดมากพอในการขาย</p>
  </div>
  {{Form::open(['id' => 'add_ticket_form', 'method' => 'post', 'enctype' => 'multipart/form-data'])}}

    @include('component.form_error')

    <div class="row">

      <div class="col-md-8">

        <div class="form-group">
          <label class="form-control-label required">ประเภทบัตร</label>
          <div class="row">
            @foreach($categories as $key => $category)
            <?php $checked = false; if($key == 0) {$checked = true;} ?>
            <div class="col-6 col-md-4">
              <div class="c-input">
                {{Form::radio('TicketToCategory[ticket_category_id]', $category->id, $checked, array('id' => 'cat'.$key))}}
                <label for="cat{{$key}}">
                  {{$category->name}}
                </label>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="form-group">
          <label class="form-control-label required">หัวข้อ</label>
          {{ Form::text('title', null, array(
            'class' => 'form-control',
            'autocomplete' => 'off'
          )) }}
        </div>

        <div class="form-group">
          <label class="form-control-label required">รายละเอียด</label>
          <!-- <div class="alert alert-info" role="alert">
            สามารถระบุ <strong>Hashtag</strong> เพื่อเป็นการจัดกลุ่ม หมวด หรือรวมเนื้อหาที่ใกล้เคียงกันให้กับประกาศของคุณ โดยพิมพ์เครื่องหมาย # ตามด้วยกลุ่มคำที่ต้องการ
          </div> -->
          {{Form::textarea('description', null, array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
          <label class="form-control-label required">ราคาที่ต้องการขาย</label>
          <div class="input-group">
            {{ Form::text('price', null, array(
              'id' => 'price_input',
              'class' => 'form-control',
              'autocomplete' => 'off',
              'aria-describedby' => 'price-addon'
            )) }}
            <span class="input-group-addon" id="price-addon">บาท</span>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label class="form-control-label">ราคาเดิมของบัตร</label>
            <div class="input-group">
              {{ Form::text('original_price', null, array(
                'id' => 'original_price_input',
                'class' => 'form-control',
                'autocomplete' => 'off',
                'aria-describedby' => 'full-price-addon'
              )) }}
              <span class="input-group-addon" id="full-price-addon">บาท</span>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label class="form-control-label">ส่วนลด</label>
            <div class="input-group">
              {{ Form::text('percent', 0, array(
                'id' => 'percent_input',
                'class' => 'form-control',
                'autocomplete' => 'off',
                'aria-describedby' => 'percent-addon',
                'disabled' => true
              )) }}
              <span class="input-group-addon" id="percent-addon">%</span>
            </div>
            <small>* จะคำนวณหลังจากกรอกราคาเดิมของบัตร</small>
          </div>
        </div>

        <div class="form-group">
          <label class="form-control-label">วันที่การใช้งาน</label>
          {{ Form::select('date_type', $dateType, null, array('id' => 'date_type_select', 'class' => 'form-control')) }}
        </div>

        <div class="row">
          <div id="date_1" class="form-group col-md-6">
            <label class="form-control-label">วันที่เริ่มใช้</label>
            <div class="input-group">
              <span class="input-group-addon" id="location-addon">
                <i class="fa fa-calendar"></i>
              </span>
              {{Form::text('date_1', null, array('id' => 'date_input_1', 'class' => 'form-control' ,'autocomplete' => 'off', 'readonly' => 'true'))}}
              <a class="date-clear" data-date-clear="#date_1"><span aria-hidden="true">×</span></a>
            </div>
          </div>

          <div id="date_2" class="form-group col-md-6">
            <label class="form-control-label required">ใช้ได้ถึง</label>
            <div class="input-group">
              <span class="input-group-addon" id="location-addon">
                <i class="fa fa-calendar"></i>
              </span>
              {{Form::text('date_2', null, array('id' => 'date_input_2', 'class' => 'form-control' ,'autocomplete' => 'off', 'readonly' => 'true'))}}
              <a class="date-clear" data-date-clear="#date_2"><span aria-hidden="true">×</span></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-control-label">สถานที่หรือตำแหน่งที่สามารถนำไปใช้ได้</label>
          <div class="input-group">
            <span class="input-group-addon" id="location-addon">
              <i class="fa fa-map-marker"></i>
            </span> 
            {{ Form::text('place_location', null, array(
              'class' => 'form-control',
              'autocomplete' => 'off',
              'aria-describedby' => 'location-addon'
            )) }}
          </div>
        </div>

        <!-- <div class="form-group">
          <label class="form-control-label">แท็ก (ไม่ต้องใส่ # หน้าคำที่ป้อน)</label>
          <div id="_tags" class="tag"></div>
          <small>* แท็กจะมีผลโดยตรงต่อการค้นหา</small>
        </div> -->

        <div class="form-group">
          <label class="form-control-label">ตำแหน่งสินค้า</label>

          <div class="selecting-lable-box">
            <div id="location_label" class="selected-value" data-toggle="modal" data-c-modal-target="#selecting_location" data-selecting-empty-label="ระบุตำแหน่งสินค้า">
              ระบุตำแหน่งสินค้า
            </div>

            <a class="selected-value-delete">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>

          <div id="selecting_location" class="c-modal">
            <a class="close"></a>
            <div class="c-modal-sidebar-inner">

              <a class="modal-close">
                <span aria-hidden="true">&times;</span>
              </a>

              <div class="list-item-panel selecting-list"></div>
              <div class="selecting-action">
                <div class="selecting-action-inner mv2">
                  <small class="mb2">เส้นทาง</small>
                  <h5 class="selecting-lable mb2">...</h5>
                </div>
              </div>
            </div>
            <input type="hidden" name="TicketToLocation[location_id]">
          </div>
        
        </div>

        <div class="form-group">
          <label class="form-control-label required">ช่องทางการติดต่อผู้ขาย</label>
          <div class="alert alert-info" role="alert">
            <ul class="ma0">
              <li>หมายเลขโทรศัพท์ อีเมล Line ID</li> 
              <li>ใช้ระบบแชทของเว็บไซต์ในการติดต่อ (คุณสามารถระบุเวลาที่คุณจะออนไลน์เพื่อให้ผู้ซื้อทราบเวลาที่สามารถติดต่อคุณได้ทันที)</li> 
            </ul>
          </div>
          {{Form::textarea('contact', null, array('class' => 'form-control'))}}
        </div>

      </div>

      <div class="col-md-4">

        <div class="form-group">
          <label class="form-control-label">รูปภาพ</label>
          <div class="alert alert-info">
            <ul class="ma0">
              <li>ขนาดไฟล์สูงสุดไม่เกิน 5 MB</li> 
              <li>อัพโหลดไฟล์ได้ในรูปแบบ JPG หรือ PNG</li> 
            </ul>
          </div>

          <div id="_image_group" class="upload-image"></div>

        </div>
        
      </div>

      <div class="col-md-8 margin-top-30">
        {{Form::submit('เริ่มต้นการขาย', array('class' => 'btn btn-primary btn-block'))}}
      </div>
      
    </div>

  {{Form::close()}}

</div>

<div class="clearfix margin-top-200"></div>

<div class="global-overlay"></div>
<div class="global-loading-indicator"></div>

<script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="/assets/js/form/ticket-form.js"></script>
<script type="text/javascript" src="/assets/js/form/upload_image.js"></script>
<script type="text/javascript" src="/assets/js/form/tagging.js"></script>
<script type="text/javascript" src="/assets/js/form/ticket-validation.js"></script>
<script type="text/javascript" src="/assets/js/form/form-datepicker.js"></script>
<script type="text/javascript" src="/assets/js/form/selecting-list.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    const images = new UploadImage('#add_ticket_form','#_image_group','Ticket','photo',10);
    images.init();
    images.setImages();

    const ticketForm = new TicketForm();
    ticketForm.init();

    // const tagging = new Tagging();
    // tagging.init();

    const date1 = new Datepicker('#date_input_1');
    date1.init();

    const date2 = new Datepicker('#date_input_2');
    date2.init();

    const locationList = new SelectingList('location','#selecting_location','#location_label');
    locationList.init();
    locationList.getData();

    Validation.initValidation();

  });
</script>

@stop