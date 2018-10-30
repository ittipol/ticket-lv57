<!-- You may customize the default maintenance mode template by defining your own template at resources/views/errors/503.blade.php -->
<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('script.script')

  <style type="text/css">

    .c-404 {
      position: relative;
      padding: 20px;
    }
    .c-404 .oops {
      color: #4B4F4B;
      font-size: 8em;
      letter-spacing: 0.05em;
      margin-top: 30px;
      margin-bottom: 20px;
    }
    .c-404 .info {
      color: #4B4F4B;
      padding: 5px;
      font-size: 1.25rem;
    }
    .c-404 .c-404-btn {
      background: #FF5659;
      color: #fff;
      text-transform: uppercase;
      padding: 10px 40px;
      border-radius: 50px;
      text-decoration: none;
    }
    .c-404 .c-404-btn:hover {
      background: #FF2629;
    }
    .c-404 .c-404-btn .fa-angle-left {
      font-size: 1.2em;
      margin-right: 15px;
    }
    .c-404 img {
      padding: 10px;
    }
</style>

  <title>503 — TicketEasys</title>
</head>
<body>

  <div class="c-404 tc mt6 mt7-ns">
     
     <h1 class="oops">503</h1>
     <p class="info">ขออภัยในความไม่สะดวก เว็บไซต์อยู่ระหว่างการปรับปรุง</p>
     <br>
  </div>

  <script type="text/javascript">

    const _io = new IO(io('{{env('SOCKET_URL')}}'));

    $(document).ready(function(){
      @if(Auth::check())
        _io.init({{Auth::user()->id}},'{{Auth::user()->user_key}}')

        const _user = new User({{Auth::user()->id}});
        _user.init();

      @endif
    });

  </script>

  @if(Session::has('message.title'))
  <script type="text/javascript">
      const snackbar = new Snackbar();
      snackbar.setTitle('{{ Session::get("message.title") }}');
      snackbar.display();
  </script>
  @endif

  <script type="text/javascript">
    new gnMenu(document.getElementById('gn-menu'));
  </script>

</body>
</html>