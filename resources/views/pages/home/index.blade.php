@extends('shared.main')
@section('content')

<div class="infomation-wrapper">
  <div class="container">
    <div class="content-section tc margin-bottom-80">
      <h1>ขายบัตรของคุณกับ TicketEasys!</h1>
      <!-- <h3 class="margin-bottom-20">ในที่สุดคุณก็สามารถขายตั๋วที่ไม่ได้ใช้ได้แล้ว</h3> -->
      <h3 class="margin-bottom-20">ซื้อ-ขาย บัตร ตั๋ว วอชเชอร์ และอื่นๆที่ไม่ได้ใช้แล้ว</h3>
      <p class="margin-bottom-5">มีผู้คนอีกมากมายที่คุณไม่คาดคิดกำลังต้องบัตรงานแสดงจากคุณ</p>
      <p class="margin-bottom-5">TicketEasys เป็นเว็บไซต์ที่ให้คุณซื้อและขายบัตรงานแสดงต่าง ๆ ได้ด้วยตัวคุณเอง</p>
    </div>

    <div class="content-section tc margin-bottom-80">
      <h3 class="margin-bottom-20">ค้นหาและขายบัตรของคุณตอนนี้</h3>
      
      {{Form::open(['url' => 'ticket','method' => 'get', 'enctype' => 'multipart/form-data'])}}
        <div class="input-group w-60-l w-100-ns mx-auto">
          <input type="text" name="q" class="form-control" placeholder="ค้นหาบัตร" autocomplete="off">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      {{Form::close()}}

    </div>
  </div>
</div>

<div class="information-grid pa5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 pt3 pt0-ns tc">
        <i class="fa fa-ticket db fs-100 mb-3" aria-hidden="true"></i>
        <h5 class="white">ลงขายบัตรของคุณ</h5>
        <p class="white">ลงขายบัตรบนเว็บไซต์ของเราโดยคุณเป็นผู้ตั้งราคา และข้อมูลอื่นๆที่คุณต้องการ</p>
      </div>
      <div class="col-md-4 pt3 pt0-ns tc">
        <i class="fa fa-comments db fs-100 mb-3" aria-hidden="true"></i>
        <h5 class="white">เลือกซื้อบัตรและสอบถามผู้ขาย</h5>
        <p class="white">ให้คุณได้พูดคุยกับผู้ขายได้ทันทีก่อนการซื้อ เพื่อให้เกิดความมั่นใจในการซื้อของคุณ</p>
      </div>
      <div class="col-md-4 pt3 pt0-ns tc">
        <i class="fa fa-users db fs-100 mb-3" aria-hidden="true"></i>
        <h5 class="white">ผู้ซื้อทั่วประเทศ</h5>
        <p class="white">มีผู้ซื้อทั่วประเทศกำลังค้นหาและต้องการบัตรจากคุณอยู่</p>
      </div>
    </div>
  </div>
</div>

<div class="information-grid-2">
  <div class="container pv4 tc">
    <i class="fa fa-retweet db fs-100 mb-3" aria-hidden="true"></i>
    <h4>เลื่อนประกาศขึ้นสู่ตำแหน่งบนได้ดัวยตัวคุณเอง</h4>
    <p>สามารถเลื่อนประกาศของคุณขึ้นสู่ตำแหน่งบนอีกครั้งเหมือนเป็นประกาศที่เพิ่งลงใหม่ๆ โดยที่คุณสามารถจัดการได้ด้วยตัวเอง เพื่อช่วยเพิ่มโอกาสในการขาย เพราะยิ่งอยู่ตำแหน่งบน โอกาสที่ประกาศของคุณจะเห็นก่อนใครก็ยิ่งมีมากขึ้น</p>
  </div>
</div>

<div class="main-content-group">
  <div class="parallax-bg">
    <div class="container pv3">
      <div class="content-section tl">
        <h1 class="mt0 mb3">เริ่มต้นขายบัตรของคุณ</h1>
        <p class="margin-bottom-20">บัตรคอนเสิร์ต ตั๋ว วอชเชอร์ และอื่นๆที่ไม่ได้ใช้แล้วสามารถนำมาขายได้ที่นี่</p>
        <a class="btn btn-primary" href="/ticket/new">
          ขายบัตรของคุณตอนนี้
        </a>
      </div>
    </div>
  </div>

  <div class="parallax-bg">
    <div class="container pv3">
      <div class="content-section tr">
        <h1 class="mt0 mb3">ค้นหาและเลือกซื้อบัตร</h1>
        <p class="margin-bottom-20">เลือกซื้อบัตรตามที่คุณต้องการ นอกจากนี้มีการแบ่งหมวดหมู่ออกเป็น 15 หมวดหมู่เพื่อง่ายต่อการเข้าถึงและค้นหา</p>
        <a class="btn btn-primary" href="/ticket">
          แสดงรายการขายบัตร
        </a>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <img class="c-logo" src="/assets/images/logo/logo_x.jpg">
      </div>
      <div class="col-6">
        <div class="tr">
          <a class="btn btn-facebook btn-share" href="https://www.facebook.com/Ticketeasys-919999211490459/">
            <i class="fa fa-facebook"></i>
          </a>
        </div>  
      </div>
    </div>
  </div>
</footer>

@stop