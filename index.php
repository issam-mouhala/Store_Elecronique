<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="design.css">
    <title>Dashboard</title>
</head>
<body>
    <nav>
         <h1>Dashboard</h1>  
      <ul>   <li>Home</li>   
            <li>Products</li>
            <li>Users</li>
            <li>option4</li>
            <li>option5</li>
        </ul>
        <h2 class="out">Out</h2>  
    </nav>
    <div class="dash">
         <div class="statique">
             <div><div class="S1 s"><span data-pro="80" id="users">0</span></div><h1>A</h1><div id="bar"><span></span></div></div> 
             <div><div class="S2 s"><span data-pro="90">0</span></div><h1>A</h1><div id="bar"><span></span></div></div>
             <div><div class="S3 s"><span data-pro="8">0</span></div><h1>A</h1><div id="bar"><span></span></div></div>
             <!-- <div><div class="S4">0</div><h1>A</h1><div id="bar"><span></span></div></div>
             <div><div class="S5">0</div><h1>A</h1><div id="bar"><span></span></div></div>  -->
         </div>
         <div class="controller">
            
         </div>
    </div>

        <?php
        echo ' <script>
        let s=document.querySelectorAll(".s > span");
        s.forEach(e => {
             let count=  setInterval(()=>{
        ++e.textContent;           
        if(e.textContent==e.dataset.pro){
            clearInterval(count);
        }
        },20/3)
        }); </script>';
        ?>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>