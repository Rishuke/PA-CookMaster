<!DOCTYPE html>
<html>
<head>
    <div class="section-title">
      <h2><span>Start the reunion</span></h2>
    <script src='https://meet.jit.si/external_api.js'></script>
    </div>
</head>
<body>
    
    
    <div class="text-center"><button id="start-meeting">Start Meeting</button></div>
    <div id="meet"></div>

    <script>
        document.getElementById('start-meeting').addEventListener('click', function() {
            const domain = 'meet.jit.si';
            const options = {
                roomName: 'PickAnAppropriateMeetingNameHere',
                width: 700,
                height: 700,
                parentNode: document.querySelector('#meet')
            };
            const api = new JitsiMeetExternalAPI(domain, options);
        });
    </script>
</body>
</html>


