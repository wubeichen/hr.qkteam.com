<div style="margin:0 auto; width:500px; height:660px;padding-top:50px; position:relative; background-image:url({{ $message->embed($image_bg) }});color:black;" align="center">
  <img src="{{  $message->embed($image_logo) }}" width="200px"; height="200px"/>
  <h3>欢迎加入晴空工作室</h3>
  <p>恭喜你通过我们的面试，现在你是晴空工作室的一员了</p>
  <p>你现在可以登陆我们的管理系统</p>
  <p>用户名:<strong>{{ $school_number }}</strong></p>
  <p>密码:<strong>{{ $password }}</strong></p>
  <a href="http://www.hr.qkteam.com" style="color:lightblue">http://www.hr.qkteam.com</a>
  <hr style="border-top:2px dotted #185598;margin-top:50px;"/>
  <img src="{{  $message->embed($image_logo) }}" width="50px"; height="50px" style="margin-top: 10px;"/>
  <div style="margin:0 auto; height:65px; line-height:65px;">
    <span>晴空网络创新工作室</span>
  </div>
</div>
