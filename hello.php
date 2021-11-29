<?php
	print "<a href='http://naver.com' target='_blank'>뭐지</a>";
	
	if (date("G")>=18) {
		print "퇴근할 시간이네요.";
	}else if (date("G")>=12) {
		print "오후도 화이팅";
	}else if (date("G")>=9) {
		print "좋은 아침입니다.";
	}else if (date("G")>=6) {
	        print "일어나세요.";
	}else{
	        print "졸리지 않나요?";
	}
?>
