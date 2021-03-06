<!doctype html>
<html>
<head>
	<title></title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/detail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/mystyle.css') }}">
    <title>微信报名系统</title>
</head>
<body>
    <div id="header">
         <p>微信报名系统</p>
    </div>
    <div id="title">
        <div id="box">
             <span id="id">第{{ $lastOne->lec_id }}期</span>
             <a id="detail" href="{{ URL::route('home.index.detail', $lastOne->lec_id) }}">了解话题详情>></a>
         </div>
        <div id="p_wrapper">
             <p id='theme'>今期话题：</p>
             <p id="content">{{ $lastOne->lec_title }}</p>
             <img id="person_logo" src="{{ URL::asset('images/person_logo.png') }}"><span id="name">特邀嘉宾：<span id="person">{{ $lastOne->lec_speaker_name }}</span></span>
             <p class="time">活动开始时间：{{ $lastOne->lec_time }}</p>
             <p class="time">报名开始时间：{{ $lastOne->lec_begintime }}</p>
             <p class="time">报名截止时间：{{ $lastOne->lec_deadline }}</p>
        </div>
    </div>
    @if ($errors->any())
            <div class="alert alert-error" style="color: red;">
                    {{ implode('<br>', $errors->all()) }}
            </div>
    @endif
    {{ Form::open(array('route' => array('home.index.signUp'))) }}
        <div id="form_outer">
            <div id="form_wrapper">
                <label>姓    名：</label>
                <input type='text' name="username" placeholder='必填 例如：张三' required="required"/><br/>
                <label>学    号：</label>
                <input type='text' name="stu_id" placeholder='必填 例如：2013211666' required="required"/><br/>
                <label>手机号：</label>
                <input type='text' name="phonenumber" placeholder='必填 例如：18883814445' required="required"/><br/>
                <input name="lec_id" type="hidden" value="{{ $lastOne->lec_id }}" />
             </div>
        </div>
        <div id="more">
            <p id="more_detail">想聊更多：</p>
            <textarea name="questions" id='feedback' placeholder='选择填写，不要超过30个字'></textarea>
        </div>
        <div id="footer">
            <input id='join_img' type="submit" alt="Submit" />
        </div>
    {{ Form::close() }}
    <div id="cover"></div>
<script type="text/javascript" src='{{ URL::asset('js/layout.js') }}'></script>
<script type="text/javascript">
    function transdate(endTime){
    var date=new Date();
    date.setFullYear(endTime.substring(0,4));
    date.setMonth(endTime.substring(5,7)-1);
    date.setDate(endTime.substring(8,10));
    date.setHours(endTime.substring(11,13));
    date.setMinutes(endTime.substring(14,16));
    date.setSeconds(endTime.substring(17,19));
    return Date.parse(date)/1000;
    }
  window.onload = function(){
            var begin = transdate("{{ $lastOne->lec_begintime }}");
            var end   = transdate("{{ $lastOne->lec_deadline }}");
            var today = {{ $time }};

            if(today > begin && today < end){
            }else{
                document.querySelector("#footer").innerHTML="<p id='join_img' style='background-color:gray;text-align:center;'>非报名时间</p>";
            }
        }
</script>
</body>
</html>