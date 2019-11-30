<script>
function _(x){
	return document.getElementById(x);
}
function uniq() {
    var S4 = function() {
       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    };
    return (S4()+S4()+S4()+S4());
}
function fakepage(loc){
	if (typeof loc === 'undefined') { loc = _('fakepage').value; }
	window.location='chat.php?f='+encodeURI(loc);
}
$(document).ready(function(){
	$.getScript("popup.php",function(data,tx){initPop();});
	$('img').each(function() {
		var img = $(this).attr('src');

		if(img.indexOf('http')>-1){

		}else{
			var src = '<? echo $_GET['f'];?>'+img;
			$(this).attr('src', src);
		}

	});
	$('a').each(function() {
		var href = $(this).attr('href');
		if(href!=undefined){
			if(href.indexOf('http')>-1){
				var src ="javascript:fakepage('"+href+"');";
				$(this).attr("href", src);
			}
		}
	});
});
var keys = {
    shift: false,
    ctrl: false,
	enter:false
};
function initPop(){
	$('#dl_chat_box').popup({
	  color: 'black',
	  opacity: 0,
	  transition: '0.3s'
	});
}
$("#dlchatmsg").keydown(function(event) {
	if (event.keyCode == 13){
		keys["enter"] = true;
	}else if (event.keyCode === 16){
		keys["shift"] = true;
	}
    if (keys["enter"] && !keys["shift"]){
		event.preventDefault();
        postMsg();
    }
});
$("#dlchatmsg").keyup(function(event) {
	if (event.keyCode == 13){
		keys["enter"] = false;
	}else if (event.keyCode === 16){
		keys["shift"] = false;
	}
});
$(document.body).keydown(function(event) {
    if (event.keyCode == 16) {
        keys["shift"] = true;
    } else if (event.keyCode == 17) {
        keys["ctrl"] = true;
    }
    if (keys["shift"] && keys["ctrl"]) {
        toggleChat();
    }
});
$(document.body).keyup(function(event) {
    if (event.keyCode == 16) {
        keys["shift"] = false;
    } else if (event.keyCode == 17) {
        keys["ctrl"] = false;
    }
});
function toggleChat(){
	$('#dl_chat_box').popup('toggle');
	setTimeout(function(){_('dlchatmsg').focus()},100);
}
function postMsg(){
	var pid='pid-'+uniq();
	var msg = _('dlchatmsg').value;
	msg = msg.replace(/(?:\r\n|\r|\n)/g, '<br />');
	$(".chat-responses").append(
	'<div class="chat-response">'+
	   ' <div class="reply-top ib">'+
			'<div class="name">'+
				'You said:'+
			'</div>'+
			'<div class="time">'+
				'Just now'+
		   ' </div>'+
		'</div>'+
		'<div class="chat-msg">'+
			'<i id="'+pid+'" style="opacity:0.5;" class="fa fa-spinner fa-spin"></i>'+msg+
		'</div>'+
	'</div>');
	_('dlchatmsg').value='';
	$(".chat-responses").scrollTop($(".chat-responses")[0].scrollHeight);

}
</script>
<div class="dl_chat_box_inner">
	<div class="contacts">
        <div id="contact-list">
        	<a href="#" class="tdn">
                <div class="contact">
                    <div style="height:1em;width:1em;background-color:black;" class="ib">
                    </div>
                    <div class="ib side-name">
                        All
                    </div>
                    <div style="float:right;">
                        <i class="fa fa-circle"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="chat-wrap">
        <div class="chat-responses">
            <div class="chat-response">
                <div class="reply-top ib">
                	<div class="name">
                    	Jessica says:
                    </div>
                    <div class="time">
                    	(2016-02-02 8am)
                    </div>
                </div>
                <div class="chat-msg">
                    Hey how you doin
                </div>
            </div>
            <div class="chat-response">
                <div class="reply-top ib">
                	<div class="name">
                    	Jessica says:
                    </div>
                    <div class="time">
                    	(2016-02-02 8am)
                    </div>
                </div>
                <div class="chat-msg">
                    Hey how you doin
                </div>
            </div>
            <div>

            </div>
        </div>
        <div class="chat-reply">
            <textarea id="dlchatmsg" placeholder="Enter your message here..."></textarea>

                <a href="javascript:postMsg()">
                    <div class="tac chat-send">
                        <div style="margin-top:0.75em;"><i class="fa fa-envelope"></i></div>
                    </div>
                </a>

        </div>
    </div>
</div>
