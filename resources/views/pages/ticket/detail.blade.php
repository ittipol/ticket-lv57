@extends('shared.main')
@section('content')

<div class="container mv4 mv6-ns">
  <div class="row">

    <div class="col-12">
      @if($data['closing_option'] != 0)
        <div class="alert alert-info tc">
          ผู้ขายปิดประกาศนี้แล้ว
        </div>
      @endif
    </div>

    <div class="col-md-8">

      <h3>{{$data['title']}}</h3>

      <div class="text-left">
        <small><strong>แชร์</strong></small>
        <a class="btn btn-facebook btn-share" href="https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}" target="_blank">
          <i class="fa fa-facebook"></i>
        </a>
        <a class="btn btn-twitter btn-share" href="https://twitter.com/intent/tweet?url={{Request::fullUrl()}}&amp;text={{$data['title']}}" target="_blank">
          <i class="fa fa-twitter"></i>
        </a>
        <a class="btn btn-googleplus btn-share" href="https://plus.google.com/share?url={{Request::fullUrl()}}" target="_blank">
          <i class="fa fa-google-plus"></i>
        </a>
      </div>  
    </div>

    <div class="col-md-8">

      <div class="ticket-detail-section ">

        @if(!empty($locations))
          <div class="additional-item">
            <i class="fa fa-map-marker color-orange"></i>
          @foreach($locations as $path)
            <small>{{$path['name']}}</small>
          @endforeach
          </div>
        @endif

        <p class="pt2-ns mb-3">{!!$data['description']!!}</p>

      </div>

      @include('shared.ig')

      @if(!empty($data['tags']))
      <div class="tags mx-2 mt4 mb3">
        @foreach($data['tags'] as $tag)
          <div class="md-chip">
            <div class="md-chip-icon">
              <i class="fa fa-tag"></i>
            </div>
            {{$tag['word']}}
          </div>
        @endforeach
      </div>
      @endif

      @if((Auth::check() && (Auth::user()->id != $data['created_by'])))
      <div class="quick-chat-section px-2 py-3">
        <h5>
          <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;<small>สอบถามผู้ขาย</small>
        </h5>
        <div>
          <a href="javascript:void(0);" data-chat-modal="1" data-chat-message="ต้องการสั่งซื้อสินค้านี้ต้องทำยังไง" class="btn btn-primary br4 pa2 ph3-ns mb2 mr2-ns w-100 w-auto-ns">ต้องการสั่งซื้อสินค้านี้?</a>
          <a href="javascript:void(0);" data-chat-modal="1" data-chat-message="ยังมีของอยู่ไหม" class="btn btn-primary br4 pa2 ph3-ns mb2 mr2-ns w-100 w-auto-ns">ยังมีของอยู่ไหม?</a>
          <a href="javascript:void(0);" data-chat-modal="1" data-chat-message="ใช้งานได้ที่ไหนบ้าง" class="btn btn-primary br4 pa2 ph3-ns mb2 mr2-ns w-100 w-auto-ns">ใช้งานได้ที่ไหนบ้าง?</a>
          <a href="javascript:void(0);" data-chat-modal="1" data-chat-message="จัดส่งสินค้าด้วยวิธีไหน" class="btn btn-primary br4 pa2 ph3-ns mb2 mr2-ns w-100 w-auto-ns">จัดส่งสินค้ายังไง?</a>
        </div>
      </div>
      @endif

    </div>

    <div class="col-md-4">

      @if(!empty($data['save']))
        <div class="price-saving-flag flag-lg">-{{$data['save']}}</div>
      @endif

      <div class="price-section py-2">
        <span class="price">{{$data['price']}}</span>
        @if(!empty($data['original_price']))
        <span class="original-price">{{$data['original_price']}}</span>
        @endif
      </div>

      <div class="additional-data-section mt-2 mb-4">

        <div class="additional-item">
          <i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;{{$data['category']}}
        </div>

        @if($data['date_type'] == 0)
          <div class="additional-item">
            <i class="fa fa-calendar"></i>&nbsp;วันที่ใช้งาน <strong>ไม่ระบุ</strong>
          </div>
        @elseif($data['date_type'] == 1)
          
          @if(!empty($data['date_1']))
          <div class="additional-item">
            <i class="fa fa-calendar"></i>&nbsp;ใช้ได้ตั้งแต่ {{$data['date_1']}} ถึง {{$data['date_2']}}
          </div>
          @else
          <div class="additional-item">
            <i class="fa fa-calendar"></i>&nbsp;ใช้ได้ถึงวันที่ {{$data['date_2']}}
          </div>
          @endif
          
        @elseif($data['date_type'] == 2)
          <div class="additional-item">
            <i class="fa fa-calendar"></i>&nbsp;วันที่แสดง {{$data['date_1']}}
          </div>
        @elseif($data['date_type'] == 3)
        
          @if(!empty($data['date_2']))
          <div class="additional-item">
            <i class="fa fa-calendar"></i>&nbsp;วันที่เดินทาง <strong>{{$data['date_1']}}</strong>
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่กลับ <strong>{{$data['date_2']}}</strong>
          </div>
          @else
          <div class="additional-item">
            <i class="fa fa-calendar"></i>&nbsp;วันที่เดินทาง <strong>{{$data['date_1']}}</strong>
          </div>
          @endif

        @endif

        @if(!empty($data['place_location']))
          <div class="additional-item">
            <i class="fa fa-map-marker"></i>&nbsp;สถานที่ใช้งาน {{$data['place_location']}}
          </div>
        @endif
      </div>

      @if(Auth::guest() || (Auth::check() && (Auth::user()->id != $data['created_by'])))

      <div class="seller-section content-fixed-bottom clearfix">
        <div class="w-40-ns w-100-l fn fl-ns fn-l pt3 pb2 pv2-ns ph3 ph2-ns clearfix">
          <div class="avatar-frame fl">       
            <div class="avatar">
              <img src="/avatar/{{$data['created_by']}}?d=1">
            </div>
          </div>
          <div class="online-name fl">
            <div><i class="fa fa-pencil"></i> <small>{{$data['created_at']}}</small><!-- {{$seller['name']}} --></div>
            <div class="online_status_indicator_{{$data['created_by']}} online-status-indicator @if($seller['online']) is-online @endif"></div>
            @if($seller['online'])
              <small class="dark-gray ml-4">ออนไลน์อยู่</small>
            @else
              <small class="dark-gray ml-4">{{$seller['last_active']}}</small>
            @endif
          </div>
        </div>
        <div class="w-60-ns w-100-l fn fl-ns fn-l pa2 pt3-ns pt2-l mb2 mb0-ns mb2-l mt0 mt2-ns mt0-l">
          <a href="/chat/s/{{$ticketId}}" class="btn btn-primary btn-block br0">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;คุยกับผู้ขาย
          </a>
        </div>
      </div>

      <div class="contact-section pa2 pa0-ns mt-3 mt-2-ns bt bn-ns b--light-silver">
        <div class="clearfix pa0 ph2-ns">
          <h5 class="mt1 pb2">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            &nbsp;<strong>ช่องทางสำหรับติดต่อผู้ขาย</strong>
          </h5>
          {!!$data['contact']!!}
        </div>
      </div>

      @else

      <div class="contact-section pa2 pa0-ns mt-3 mt-2-ns bt b--light-silver">
        <div class="clearfix pa0 ph2-ns pv2-ns">
          <h5 class="mt1 pb2">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            &nbsp;<strong>ช่องทางสำหรับติดต่อผู้ขาย</strong>
          </h5>
          {!!$data['contact']!!}
        </div>
      </div>

      <div class="action-section content-fixed-bottom bt-l b--light-silver ph2 pv2 pa3-ns pt3-ns mt3-ns clearfix">

        <div class="w-50-ns w-100-l fn fl-ns fn-l">

          @if($data['pullingPost']['allow'])
          <div class="c-card__actions clearfix tc pa0">
            <a class="c-btn c-btn__primary w-100 mb3 mh0 mb0-ns br0 db" href="/ticket/pull/{{$data['id']}}"><i class="fa fa-retweet"></i> เลื่อนประกาศขึ้นสู่ตำแหน่งบน</a>
          </div>
          @else
          <div class="mb2 mb0-l f6 f5-ns">
            ยังไม่สามารถเลื่อนประกาศได้ในตอนนี้ จะสามารถเลื่อนประกาศขึ้นสู่ตำแหน่งบนได้ในอีก <strong>{{$data['pullingPost']['daysLeft']}}</strong>
          </div>
          @endif

          <small class="dn db-ns mb4 pa0 pt2-l">หลังจากเมื่อคุณได้เลื่อนตำแหน่งประกาศแล้ว จะสามารถเลื่อนประกาศในครั้งถัดไปได้เมื่อครบกำหนดทุก 3 วัน</small>
        </div>

        <div class="w-50-ns w-100-l fn fl-ns fn-l">
          <div class="c-card__actions clearfix tc pa0">
            <a class="c-btn c-btn__secondary w-50 fl ma0 br0 db" href="/ticket/edit/{{$data['id']}}"><i class="fa fa-pencil"></i> แก้ไข</a>
            <a class="c-btn w-50 fl ma0 br0 db" href="javascript:void(0);" data-t-id="{{$data['id']}}" data-t-title="{{$data['title']}}" data-t-closing-modal="1"><i class="fa fa-times"></i> ปิดประกาศ</a>
          </div>
          <small class="dn db-ns pa0 pa2-ns pa0-l pt2-l">ปิดประกาศของคุณเมื่อ <strong>ขายสินค้านี้แล้ว</strong> หรือหากต้องการ <strong>ยกเลิกรายการ</strong></small>
        </div>
      
      </div>

      @endif

    </div>

  </div>
</div>

<div class="clearfix margin-top-200"></div>

@if(Auth::check() && (Auth::user()->id == $data['created_by']))
  @include('shared.ticket-closing-modal')
@elseif(Auth::check())
  @include('shared.ticket-chat-room')
@endif

<script type="text/javascript" src="/assets/js/user_online.js"></script>
<script type="text/javascript" src="/assets/lib/ig/photoswipe.min.js"></script>
<script type="text/javascript" src="/assets/lib/ig/photoswipe-ui-default.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    const _userOnline = new UserOnline();
    _userOnline.init();
    _userOnline.check({{$data['created_by']}});
  });
</script>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": 
  [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "{{url('/')}}/?category[]={{$data['category_id']}}&sort=post_n",
      "name": "{{$data['category']}}"
    }
  },
  {
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "{{url('/')}}/view/{{$data['id']}}",
      "name": "{{$data['title']}}"
    }
  }]
}
</script>

@stop