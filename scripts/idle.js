let idleTime = 0;

let idleInterval = setInterval(timerIncrement,60000);

this.onmousemove = (e)=>idleTime=0;
this.onkeypress = (e)=>idleTime=0;

function timerIncrement() {
	idleTime+=1;	
	if(idleTime>29){
		let warning = alert("Session Anda Habis. Harap Login kembali");
		window.location.assign("system/logout.php");
		idleTime=0;
		clearInterval(idleInterval);
	}
}